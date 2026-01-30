<?php

use App\Livewire\UserList;
use App\Models\Review;
use App\Models\Series;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('renders the user list component successfully', function () {
    Livewire::test(UserList::class)
            ->assertStatus(200);
});

it('filters reviews by search term', function () {
    $naruto = Series::factory()->create(['name' => 'Naruto']);
    $bleach = Series::factory()->create(['name' => 'Bleach']);

    Review::factory()->create(['user_id' => $this->user->id, 'series_id' => $naruto->id]);
    Review::factory()->create(['user_id' => $this->user->id, 'series_id' => $bleach->id]);

    Livewire::test(UserList::class)
            ->set('search', 'Naruto')
            ->assertSee('Naruto')
            ->assertDontSee('Bleach');
});

it('filters reviews by type (Anime vs Manga)', function () {
    $anime = Series::factory()->create(['name' => 'My Hero', 'type' => 'Anime']);
    $manga = Series::factory()->create(['name' => 'Berserk', 'type' => 'Manga']);

    Review::factory()->create(['user_id' => $this->user->id, 'series_id' => $anime->id]);
    Review::factory()->create(['user_id' => $this->user->id, 'series_id' => $manga->id]);

    Livewire::test(UserList::class)
            // Default is Anime
            ->assertSee('My Hero')
            ->assertDontSee('Berserk')

            // Switch to Manga
            ->set('type', 'Manga')
            ->assertSee('Berserk')
            ->assertDontSee('My Hero');
});

it('calculates stats correctly', function () {
    $anime = Series::factory()->create(['type' => 'Anime', 'episodes' => 12]);
    $manga = Series::factory()->create(['type' => 'Manga']);

    // Watched 5 eps of Anime
    Review::factory()->create([
            'user_id' => $this->user->id,
            'series_id' => $anime->id,
            'progress' => 5
    ]);

    // Read 10 chapters of Manga
    Review::factory()->create([
            'user_id' => $this->user->id,
            'series_id' => $manga->id,
            'progress' => 10
    ]);

    Livewire::test(UserList::class)
            ->assertSet('stats.total_series', 2)
            ->assertSet('stats.episodes_watched', 5)
            ->assertSet('stats.chapters_read', 10);
});


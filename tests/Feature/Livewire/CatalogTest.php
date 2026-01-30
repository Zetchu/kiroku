<?php

use App\Livewire\Catalog;
use App\Models\Genre;
use App\Models\Series;
use Livewire\Livewire;

it('renders the catalog component', function () {
    Livewire::test(Catalog::class)
        ->assertStatus(200);
});

it('filters series by genre', function () {
    $action = Genre::factory()->create(['name' => 'Action']);
    $romance = Genre::factory()->create(['name' => 'Romance']);

    $actionSeries = Series::factory()->create(['name' => 'Action Movie']);
    $actionSeries->genres()->attach($action);

    $romanceSeries = Series::factory()->create(['name' => 'Love Story']);
    $romanceSeries->genres()->attach($romance);

    Livewire::test(Catalog::class)
        ->set('genre', $action->id)
        ->assertSee('Action Movie')
        ->assertDontSee('Love Story');
});


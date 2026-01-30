<?php

use App\Livewire\SeriesImporter;
use App\Services\JikanService;
use Livewire\Livewire;
use Mockery\MockInterface;

it('can import series using the service', function () {
    // 1. Mock the Service
    $this->mock(JikanService::class, function (MockInterface $mock) {
        $mock->shouldReceive('fetchPopular')
            ->once()
            ->with('anime', 1)
            ->andReturn([
                [
                    'name' => 'Naruto',
                    'synopsis' => 'Ninjas.',
                    'type' => 'Anime',
                    'status' => 'Finished',
                    'studio' => 'Pierrot',
                    'episodes' => 220,
                    'imageUrl' => 'http://example.com/img.jpg',
                    'genres' => ['Action', 'Shonen'],
                ]
            ]);
    });

    // 2. Act
    Livewire::test(SeriesImporter::class)
        ->call('openModal') // <--- FIX: Open the modal first!
        ->assertSet('showModal', true) // Verify it opened
        ->set('type', 'anime')
        ->set('page', 1)

        // Step A: Trigger the Fetch
        ->call('fetch')
        ->assertSet('showModal', true) // It should stay open
        ->assertSet('step', 2)         // It should move to Step 2 (Preview)
        ->assertCount('fetchedData', 1)

        // Step B: Trigger the Import
        ->call('importToDatabase')
        ->assertDispatched('series-imported')
        ->assertSet('showModal', false); // It should close after importing

    // 3. Assert Database
    $this->assertDatabaseHas('series', [
        'name' => 'Naruto',
        'studio' => 'Pierrot',
        'type' => 'Anime',
    ]);

    $this->assertDatabaseHas('genres', [
        'name' => 'Action'
    ]);
});
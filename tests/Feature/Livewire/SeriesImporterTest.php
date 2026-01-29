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
                    'type' => 'Anime', // <--- CHANGED FROM 'TV' TO 'Anime'
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
        ->set('type', 'anime')
        ->set('page', 1)
        ->call('import');

    // 3. Assert
    $this->assertDatabaseHas('series', [
        'name' => 'Naruto',
        'studio' => 'Pierrot',
        'type' => 'Anime', // <--- Ensure this matches the change above
    ]);

    $this->assertDatabaseHas('genres', [
        'name' => 'Action'
    ]);
});
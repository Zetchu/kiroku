<?php

use App\Models\Series;

it('can fetch all series', function () {
    Series::factory(3)->create();

    $response = $this->getJson('/api/series');

    $response->assertStatus(200)
        ->assertJsonCount(3, 'data');
});


it('can fetch a single series', function () {
    $series = Series::factory()->create(['name' => 'Naruto']);

    $response = $this->getJson('/api/series/' . $series->id);

    $response->assertStatus(200)
        ->assertJsonPath('data.title', 'Naruto');
});

it('returns 404 for non-existent series', function () {
    $response = $this->getJson('/api/series/99999');

    $response->assertStatus(404);
});
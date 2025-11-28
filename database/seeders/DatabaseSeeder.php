<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Series;
use App\Models\User;
use Database\Factories\SeriesFactory;

// Import the factory class
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Create Admin
        User::factory()->create([
            'name' => 'David Admin',
            'email' => 'david@test.com',
            'password' => Hash::make('david100'),
            'is_admin' => true,
        ]);

        // 2. Create Random Users
        $users = User::factory(10)->create();

        // 3. Create Genres
        $genres = Genre::insert([
            ['name' => 'Shonen'],
            ['name' => 'Sci-fi'],
            ['name' => 'Fantasy'],
            ['name' => 'Action'],
            ['name' => 'Slice of Life'],
            ['name' => 'Mystery'],
            ['name' => 'Horror'],
            ['name' => 'Romance'],
        ]);
        $genreIds = Genre::pluck('id')->all();

        // 4. Create Series (Master Catalog)
        // Automatically counts how many items are in the static array so we don't miss any
        $totalSeriesCount = count(SeriesFactory::$seriesData);
        $seriesList = Series::factory($totalSeriesCount)->create();

        // Attach genres
        $seriesList->each(function ($series) use ($genreIds) {
            $series->genres()->attach(
                fake()->randomElements($genreIds, fake()->numberBetween(1, 3))
            );
        });

        // 5. Create Reviews (Logic updated to leave 2 unreviewed)
        $allUsers = User::all();

        // Identify one Anime and one Manga to EXCLUDE from reviews
        $unreviewedAnime = $seriesList->where('type', 'Anime')->first();
        $unreviewedManga = $seriesList->where('type', 'Manga')->first();

        // Filter the list: Users will only review series NOT in this exclusion list
        $reviewableSeries = $seriesList->reject(function ($series) use ($unreviewedAnime, $unreviewedManga) {
            return $series->id === $unreviewedAnime->id || $series->id === $unreviewedManga->id;
        });

        $allUsers->each(function ($user) use ($reviewableSeries) {
            // Pick random series from the FILTERED list
            $randomSeries = $reviewableSeries->random(rand(3, 8)); // Adjusted count slightly

            foreach ($randomSeries as $serie) {
                Review::factory()->create([
                    'user_id' => $user->id,
                    'series_id' => $serie->id,
                    'rating' => fake()->numberBetween(5, 10),
                    'status' => fake()->randomElement(['Watching', 'Completed']),
                    'progress' => fake()->numberBetween(1, $serie->episodes ?? 24),
                ]);
            }
        });

        // 6. Create Comments (Also only on reviewable series to keep the others clean)
        Comments::factory(30)->recycle($allUsers)->recycle($reviewableSeries)->create();
    }
}
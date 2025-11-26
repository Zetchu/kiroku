<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Series;
use App\Models\User;
use Database\Factories\GenreFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //creates my admin acc
        User::factory()->create([
            'name' => 'David Admin',
            'email' => 'david@test.com',
            'password' => Hash::make('david100'),
            'is_admin' => true,
        ]);
        //creates 5 random users
        User::factory(5)->create();
        //creates generes
        $genres = Genre::insert([
            ['name' => 'Shonen'],
            ['name' => 'Sci-fi'],
            ['name' => 'Fantasy'],
            ['name' => 'Action'],
            ['name' => 'Slice of Life'],
            ['name' => 'Mystery'],
        ]);

        $genreIds = Genre::pluck('id')->all();
        $series = Series::factory(14)->create();

        $series->each(function (Series $series) use ($genreIds) {
            // Randomly select 1 to 3 genre IDs from the array
            $series->genres()->attach(
                fake()->randomElements($genreIds, fake()->numberBetween(1, 3))
            );
        });

        // we make each user review 5 to 10 random series
        $allUsers = User::all();

        $allUsers->each(function ($user) use ($series) {
            $randomSeries = $series->random(rand(5, 10));
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
        
        Comments::factory(30)->recycle($allUsers)->recycle($series)->create();

    }
}

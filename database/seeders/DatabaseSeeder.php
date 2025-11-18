<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Genre;
use App\Models\Series;
use App\Models\User;
use Database\Factories\GenreFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        $genres = Genre::insert([
            ['name' => 'Shonen'],
            ['name' => 'Sci-fi'],
            ['name' => 'Fantasy'],
            ['name' => 'Action'],
            ['name' => 'Slice of Life'],
            ['name' => 'Mystery'],
        ]);

        Comments::factory(15)->create();

        $genreIds = Genre::pluck('id')->all();
        $series = Series::factory(14)->create();

        $series->each(function (Series $series) use ($genreIds) {
            // Randomly select 1 to 3 genre IDs from the array
            $series->genres()->attach(
                fake()->randomElements($genreIds, fake()->numberBetween(1, 3))
            );
        });
        
    }
}

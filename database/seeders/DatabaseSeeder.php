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

        Comments::factory(15) -> create();
        User::factory(5) -> create();
        Genre::create(['name'=>'Shonen']);
        Genre::create(['name'=>'Sci-fi']);
        Genre::create(['name'=>'Fantasy']);
        $series = Series::factory(10) -> create();

        $series->each(function ($series){
            $series->genres()->attach([1,2,3]);
        });
    }
}

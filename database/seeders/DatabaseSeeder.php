<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Series;
use App\Models\User;
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
        Series::factory(6) -> create();
        Comments::factory(6) -> create();
    }
}

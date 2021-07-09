<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(100)->has(
            Comment::factory(10)->has(
                Comment::factory(5),
                'replies'
            )
        )->create();
    }
}

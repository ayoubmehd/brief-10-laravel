<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\Role;
use App\Models\User;
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
        Role::factory()->state(['name' => 'admin'])->create();
        Role::factory()->state(['name' => 'user'])->create();
        User::factory(10)->create();
        Movie::factory(100)->has(
            Comment::factory(10)->has(
                Comment::factory(5),
                'replies'
            )
        )->create();
    }
}

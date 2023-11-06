<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // // Create and attach tags
        // Tag::factory()->count(20)->create();

        // Create admin user
        User::create([
        'name' => 'Admin',
        'email' => 'admin@dev.tribes.work',
        'user_type' => 'admin',
        'password' => Hash::make('password')
    ]);

    }
}

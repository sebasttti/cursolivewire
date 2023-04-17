<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Storage::deleteDirectory('posts');
        //Storage::makeDirectory('posts');
        
        Post::factory(55)->create();

        User::factory()->create([
             'name' => 'Sebastian Joya',
             'email' => 'juansjoya_r@outlook.com',
             'password' => Hash::make('fjn120716'),
        ]);
    }
}

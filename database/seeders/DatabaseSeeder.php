<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        Post::factory(10)->create();
        Category::factory(10)->create();
        Tag::factory(10)->create();

        DB::table('users')->insert([
            'id' => 11,
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2a$12$e8WjmzwonWFEaBMhyN7CDu7W49adqhpaMoHOYObx5v3llDNxAotnW',
            'is_admin' => 1
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Post::factory(100)->create();
        \App\Models\Category::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Country::create(['name' => 'Indonesia']);
        City::create(['country_id' => 1, 'name' => 'Jakarta']);
        City::create(['country_id' => 1, 'name' => 'Ponorogo']);
        City::create(['country_id' => 1, 'name' => 'Surabaya']);
        City::create(['country_id' => 1, 'name' => 'Madiun']);

        Tag::create(['name' => 'Filosofi', 'slug' => 'Filosofi']);
        Tag::create(['name' => 'Muhammadiyahan', 'slug' => 'Muhammadiyahan']);
        Tag::create(['name' => 'Bukber', 'slug' => 'Bukber']);

    }
}

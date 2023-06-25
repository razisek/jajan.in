<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Animation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Art & Design',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cosplay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Video',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Music',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Photography',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Writing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

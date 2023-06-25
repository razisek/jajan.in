<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        SocialLink::insert([
            [
                'name' => 'Facebook',
                'link' => 'https://facebook.com/',
                'code' => 'fb',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Twitter',
                'link' => 'https://twitter.com/',
                'code' => 'tw',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Instagram',
                'link' => 'https://instagram.com/',
                'code' => 'ig',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Youtube',
                'link' => 'https://youtube.com/',
                'code' => 'yt',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tiktok',
                'link' => 'https://tiktok.com/',
                'code' => 'tk',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Discord',
                'link' => 'https://discord.com/',
                'code' => 'dc',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Website',
                'link' => 'https://',
                'code' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

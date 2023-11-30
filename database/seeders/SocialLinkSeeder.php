<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $socials = [
            [
                'name' => 'Facebook',
                'link' => 'https://facebook.com/',
                'code' => 'fb',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756281/facebook_rbbzo6.png'
            ],
            [
                'name' => 'Twitter',
                'link' => 'https://twitter.com/',
                'code' => 'tw',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756281/twitter_saxvln.png'
            ],
            [
                'name' => 'Instagram',
                'link' => 'https://instagram.com/',
                'code' => 'ig',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756282/instagram_napdfs.png'
            ],
            [
                'name' => 'Youtube',
                'link' => 'https://youtube.com/',
                'code' => 'yt',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756280/youtube_bmkmsf.png'
            ],
            [
                'name' => 'Tiktok',
                'link' => 'https://tiktok.com/',
                'code' => 'tk',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756281/tiktok_sljkbz.png'
            ],
            [
                'name' => 'Discord',
                'link' => 'https://discord.com/',
                'code' => 'dc',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756280/discord_fofogp.png'
            ],
            [
                'name' => 'Website',
                'link' => 'https://',
                'code' => 'web',
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687756281/web_leciep.png'
            ]
        ];

        foreach ($socials as $social) {
            $object = SocialLink::create([
                'name' => $social['name'],
                'link' => $social['link'],
                'code' => $social['code']
            ]);
            $object->addMediaFromUrl($social['icon'])->toMediaCollection($social['code']);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'name' => 'Donut',
                'price' => 5000,
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687779815/donut_uejo38.png'
            ],
            [
                'name' => 'Es Krim',
                'price' => 10000,
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687779814/ice_cream_nocj2u.png'
            ],
            [
                'name' => 'Kue',
                'price' => 15000,
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687779814/two_tiered_strawberry_cake_on_a_plate_srpung.png'
            ],
            [
                'name' => 'Pizza',
                'price' => 20000,
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687779814/slice_of_pizza_mtgwn3.png'
            ],
            [
                'name' => 'Mie',
                'price' => 50000,
                'icon' => 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1687780341/noodle-3899589_1280_etkf8j.png'
            ]
        ];

        foreach ($units as $unit) {
            $item = Unit::create([
                'name' => $unit['name'],
                'price' => $unit['price']
            ]);

            $item->addMediaFromUrl($unit['icon'])->toMediaCollection('unit');
        }
    }
}

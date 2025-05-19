<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Menu::create([
            'name' => 'Nasi Goreng',
            'description' => 'Nasi goreng dengan sambal khas Nauli',
            'price' => 17000,
            'image' => 'Ayam_Geprek.jpg',
            'is_available' => true,
        ]);

        Menu::create([
            'name' => 'Ayam Bakar',
            'description' => 'Aam bakar  sambal khas Nauli',
            'price' => 17000,
            'image' => 'Ayam_Geprek.jpg',
            'is_available' => true,
        ]);
    }
}

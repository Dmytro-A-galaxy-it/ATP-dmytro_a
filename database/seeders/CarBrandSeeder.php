<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBrand;
use Illuminate\Support\Str;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Mercedes-Benz',
            'Volkswagen',
            'Ford',
            'Chevrolet',
            'Dodge',
            'Nissan',
            'Fiat',
            'Renault',
            'Peugeot',
            'Iveco',
            'Toyota',
            'Opel',
            'MAN',
            'Mitsubishi',
            'LDV'
        ];

        foreach ($brands as $brand){
            CarBrand::create([
                'name' => $brand
            ]);
        }
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\DriveModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $bus_models = [
            'brands' => [
                'Chevrolet',
                'Dodge',
                'Nissan',
                'Mercedes-Benz',
                'Fiat'
            ],
            'email' => [
                'driver1@gmail.com',
                'driver2@gmail.com',
                'driver3@gmail.com',
                'driver5@gmail.com',
                'driver3@gmail.com'
            ]
        ];



        foreach($bus_models['brands'] as $key => $brand){

            $email = $bus_models['email'][$key];
            $this->createBus($brand, $email);
        }
    }

    private function generateRandomNumberBus(){

        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $number = '';

        $number .= $letters[rand(0, strlen($letters) - 1)];
        $number .= $letters[rand(0, strlen($letters) - 1)];

        for ($i = 0; $i < 4; $i++) {
            $number .= $numbers[rand(0, strlen($numbers) - 1)];
        }

        $number .= $letters[rand(0, strlen($letters) - 1)];
        $number .= $letters[rand(0, strlen($letters) - 1)];

        return $number;
    }

    private function createBus($brand,$email){
        $car_barnds = CarBrand::whereBrand($brand)->first();
        $user = DriveModel::whereEmail($email)->first();
        DB::table('bus_models')->insert([
            'deg_namber' => $this->generateRandomNumberBus(),
            'brand_id' => $car_barnds->id,
            'drive_id' => $user->id
        ]);
    }
}

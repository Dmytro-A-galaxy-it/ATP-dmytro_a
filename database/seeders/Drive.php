<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Drive extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\DriveModel::factory()->create([
            'name' => Str::random(5),
            'surname' => Str::random(8),
            'photo' =>  Str::random(10),
            'email' => Str::random(7).'@example.com'
        ]);
    }
}

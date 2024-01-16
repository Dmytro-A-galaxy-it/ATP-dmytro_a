<?php

namespace Database\Seeders;

use App\Models\Atp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $atp = 'image/atp.jpg';
        DB::table('atps')->insert([
            'name' => 'ATP',
            'logo' => $atp,
            'phone' => '+380686493126',
            'description' => 'Компанія ATP є лідером у світі в 
            галузі розробки та впровадження інноваційних автоматизованих 
            систем транспорту, перетворюючи спосіб, яким ми сприймаємо 
            та використовуємо транспортні послуги.'
        ]);
    }
}
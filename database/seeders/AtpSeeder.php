<?php

namespace Database\Seeders;

use App\Models\Atp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atp::create([
            'name' => 'ATP',
            'logo' => '',
            'phone' => '+380686493126',
            'description' => 'Компанія ATP є лідером у світі в 
            галузі розробки та впровадження інноваційних автоматизованих 
            систем транспорту, перетворюючи спосіб, яким ми сприймаємо 
            та використовуємо транспортні послуги.'
        ]);
    }
}

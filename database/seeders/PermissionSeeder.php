<?php

namespace Database\Seeders;

use Backpack\PermissionManager\app\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            'application',
            'user-mengement',
            'drive-models',
            'atps',
            'bus-models',
            'car-brand'
        ];

        foreach ($permission as $permissionName){
            Permission::create([
                'name' => $permissionName
            ]);
        }
    }
}

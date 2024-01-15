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
            'application1',
            'user-mengement1',
            'drive-models1',
            'atps1',
            'bus-models1',
            'car-brand1'
        ];

        foreach ($permission as $permissionName){
            Permission::create([
                'name' => $permissionName
            ]);
        }
    }
}

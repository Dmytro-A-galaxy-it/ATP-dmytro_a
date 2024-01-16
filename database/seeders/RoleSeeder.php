<?php

namespace Database\Seeders;

use Backpack\PermissionManager\app\Models\Role;
use Backpack\PermissionManager\app\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Driver',
            'Manager'
        ];

        $admin = Permission::all();

        foreach($roles as $role){

            $rolepr = Role::create([
                'name' => $role
            ]);
            
            if($role == 'Admin'){
                $this->permissionAll($admin,$rolepr);
            } elseif ($role == 'Driver'){
                $rolepr->givePermissionTo('bus-models');
                $rolepr->givePermissionTo('drive-models');
            } elseif ($role == 'Manager'){
                $rolepr->givePermissionTo('bus-models');
                $rolepr->givePermissionTo('drive-models');
                $rolepr->givePermissionTo('application');
            }
        }
    }

    private function permissionAll($admin,$rolepr){
        foreach ($admin as $adminper){
            $rolepr->givePermissionTo($adminper);
        }
    }
}

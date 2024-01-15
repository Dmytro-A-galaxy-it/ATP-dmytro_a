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
            'Admin1',
            'Driver1',
            'Manager1'
        ];

        $admin = Permission::all();

        foreach($roles as $role){

            $rolepr = Role::create([
                'name' => $role
            ]);
            
            if($role == 'Admin1'){
                $this->permissionAll($admin,$rolepr);
            } elseif ($role == 'Driver1'){
                $rolepr->givePermissionTo('bus-models');
                $rolepr->givePermissionTo('drive-models');
            } elseif ($role == 'Manager1'){
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

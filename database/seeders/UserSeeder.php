<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Backpack\PermissionManager\app\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $role){
            if ($role->name == 'Admin') {
                $user = $this->usercreate('adminUser', 'admiUs@example.com', '123456789');
                $user->assignRole($role->name);
            } elseif($role->name == 'Manager') {
                $user = $this->usercreate('maneger', 'maneger@gmail.com', '123456789');
                $user->assignRole($role->name);
            } elseif($role->name == 'Driver') {
                $user = $this->usercreate('driver', 'driver@gmail.com', '123456789');
                $user->assignRole($role->name);
            }
        }        
    }

    private function usercreate($name, $email, $password){
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }
}

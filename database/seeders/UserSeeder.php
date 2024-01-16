<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Support\Facades\DB;

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
                $user = $this->usercreate('driver1', 'driver1@gmail.com', '123456789');
                $user->assignRole($role->name);
                $this->drivecreate('drive1', 'drive1','1989-04-05',5446,'driver1@gmail.com');
                $user = $this->usercreate('driver2', 'driver2@gmail.com', '123456789');
                $user->assignRole($role->name);
                $this->drivecreate('drive2', 'drive2','1989-05-05',5500,'driver2@gmail.com');
                $user = $this->usercreate('driver3', 'driver3@gmail.com', '123456789');
                $user->assignRole($role->name);
                $this->drivecreate('drive3', 'drive3','1999-01-05',8040,'driver3@gmail.com');
                $user = $this->usercreate('driver4', 'driver4@gmail.com', '123456789');
                $user->assignRole($role->name);
                $this->drivecreate('drive4', 'drive4','1989-03-12',6000,'driver4@gmail.com');
                $user = $this->usercreate('driver5', 'driver5@gmail.com', '123456789');
                $user->assignRole($role->name);
                $this->drivecreate('drive5', 'drive5','1990-11-05',7500,'driver5@gmail.com');
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

    private function drivecreate($name, $surname, $birthday, $salary, $email){

        $user = User::whereEmail($email)->first();
        return DB::table('drive_models')->insert([
            'name' => $name,
            'surname' => $surname,
            'birthday' => $birthday,
            'photo' => 'image/atp.jpg',
            'salary' => $salary,
            'email' => $email,
            'user_id' => $user->id
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name'      => 'adminator',
            'email'     => 'maalpa@fp.insjoaquimmir.cat',
            'password'  => 'admin123',
        ]);
        $admin->assignRole('admin');
        $admin->save();
    } 
}

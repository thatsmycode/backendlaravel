<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $jugador = Role::create(['name' => Role::JUGADOR]);
     $editor = Role::create(['name' => Role::EDITOR]);
     $admin = Role::create(['name' => Role::ADMIN]);
    }
}

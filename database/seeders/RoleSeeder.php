<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = Role::create(['name' => 'Owner']);
        $role = Role::create(['name' => 'Judge']);
        $role = Role::create(['name' => 'participant']);
       
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder{
    public function run(): void{
        Role::create([
            'name' => 'Admin',
            'details' => 'Admin has all the access in the whole system',
            'status'=>1
        ]);
        Role::create([
            'name' => 'Customer',
            'details' => 'A customer does not have the access in the backend.',
            'status'=>1
        ]);
        Role::create([
            'name' => 'Driver',
            'details' => 'A driver does not have the access in the backend.',
            'status'=>1
        ]);
    }
}

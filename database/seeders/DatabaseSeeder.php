<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder{
    public function run(): void{
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

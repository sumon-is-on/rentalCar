<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder{

    public function run(): void{
        Brand::create([
            'name' => 'BMW',
            'country'=>'Germany',
            'details' => 'BMW is the worlds most popular brand',
            'status'=>1
        ]);
        Brand::create([
            'name' => 'Mercedese',
            'country'=>'Germany',
            'details' => 'Mercedese is the worlds most popular brand',
            'status'=>1
        ]);
        Brand::create([
            'name' => 'Toyota',
            'country'=>'Japan',
            'details' => 'Toyota is the worlds most popular brand',
            'status'=>1
        ]);
    }
}

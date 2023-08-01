<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder{

    public function run(): void{
        Service::create([
            'name' => 'Weeding',
            'details' => 'Weeding service will be count theought the weeding day',
            'status'=>1
        ]);
        Service::create([
            'name' => 'Inter City',
            'details' => 'A tour in the city',
            'status'=>1
        ]);
        Service::create([
            'name' => 'Day Long',
            'details' => 'A 24 hours tour',
            'status'=>1
        ]);
    }
}

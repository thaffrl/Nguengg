<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    { 
        DB::table('customers')->insert([ 
            [ 
                'firstname' => 'Purnama', 
                'lastname' => 'Anaking', 
                'email'=> 'purnama.anaking@gmail.com', 
                'age' => 20, 
                'car_id' => 1 
            ], 
            [ 
                'firstname' => 'Adzanil', 
                'lastname' => 'Rachmadhi', 
                'email'=> 'adzanil.rachmadhi@gmail.com', 
                'age' => 25, 
                'car_id' => 2 
            ], 
            [ 
                'firstname' => 'Berlian', 
                'lastname' => 'Rahmy', 
                'email'=> 'berlian.rahmy@gmail.com', 
                'age' => 23, 
                'car_id' => 3 
            ], 
        ]); 
    } 
} 

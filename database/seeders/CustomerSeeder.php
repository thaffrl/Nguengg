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
                'firstname' => 'Althaf', 
                'lastname' => 'Farrel', 
                'email'=> 'althaffarrelbusiness@gmail.com', 
                'age' => 20, 
                'car_id' => 1 
            ], 
        ]); 
    } 
} 

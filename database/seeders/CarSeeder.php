<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    { 
        DB::table('cars')->insert([ 
            [ 
                'code' => 'XP', 
                'name' => 'Xpander', 
                'description' => 'Mitsubishi-Xpander' 
            ], 
            [ 
                'code' => 'CV', 
                'name' => 'Civic', 
                'description' => 'Honda-Civic' 
            ], 
            [ 
                'code' => 'NM', 
                'name' => 'Nissan Magnite', 
                'description' => 'Nissan-Nissan Magnite' 
            ], 
        ]); 
    } 
} 


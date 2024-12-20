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
        DB::table('car')->insert([ 
            [ 
                'code' => 'XP', 
                'name' => 'Xpander', 
                'price' => 'Rp350000' 
            ], 
            [ 
                'code' => 'FT', 
                'name' => 'Fortuner', 
                'price' => 'Rp400000' 
            ], 
            [ 
                'code' => 'CR', 
                'name' => 'Chery', 
                'price' => 'Rp500000' 
            ], 
        ]); 
    } 
} 


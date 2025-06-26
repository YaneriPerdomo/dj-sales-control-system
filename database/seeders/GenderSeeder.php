<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gender')->insert([
            [
                "gender" => 'M'
            ],
            [
                "gender" => "F"
            ]
        ]);
    }
}

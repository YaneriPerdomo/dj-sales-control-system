<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentityCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert(
            [
                [
                    'identity_card' => 'Venezolano cedulado',
                    'description' => 'Cédula de identidad para ciudadanos venezolanos.',
                ],
                [
                    'identity_card' => 'Extranjero cedulado',
                    'description' => 'Cédula de identidad para ciudadanos extranjeros residentes..',
                ],
                [
                    'identity_card' => ' Ciudadano no cedulado',
                    'description' => 'Identificador para un cuidadano que no tiene ningun documento legar.',
                ],
            ]
        );
    }
}

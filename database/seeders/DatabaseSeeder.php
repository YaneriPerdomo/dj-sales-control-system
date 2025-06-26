<?php

namespace Database\Seeders;

use App\Models\DollarRate;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            LocationSeeder::class,
            DollarRate::class,
            GenderSeed::class,
            IdentityCardSeeder::class,
            IvaSeeder::class,
            BusinessDataSeeder::class,
            CreditRateSeeder::class,
            SupplierSeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
        ]);


    }
}

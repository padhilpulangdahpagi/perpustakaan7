<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class, // Wajib nomor satu
            BukuSeeder::class,
            AnggotaSeeder::class,
        ]);
    }
}
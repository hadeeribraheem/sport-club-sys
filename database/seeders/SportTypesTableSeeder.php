<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sport_types')->insert([
            ['name' => 'Football', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Basketball', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tennis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Swimming', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

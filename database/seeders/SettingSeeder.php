<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            ['default_sport_id' => 2 ,  'max_users_per_team' => 15 , 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

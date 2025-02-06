<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            ['name' => 'Red Warriors', 'sport_type_id' => 1, 'status' => 'active', 'players_limit' => 11, 'coach_id' => 2, 'captain_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blue Sharks', 'sport_type_id' => 2, 'status' => 'active', 'players_limit' => 5, 'coach_id' => 3, 'captain_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Golden Racquets', 'sport_type_id' => 3, 'status' => 'active', 'players_limit' => 1, 'coach_id' => 7, 'captain_id' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

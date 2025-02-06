<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportPropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sport_properties')->insert([
            // Football

            /*************   individual     ***************/
            ['name' => 'Player Position', 'input_type' => 'text', 'type' => 'individual', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jersey Number', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Goals Scored', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assists', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            /*************   team     ***************/
            ['name' => 'Team Points in League', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Games Played', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wins', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Draws', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Losses', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Basketball

            /*************   individual     ***************/
            ['name' => 'Player Position', 'input_type' => 'text', 'type' => 'individual', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jersey Number', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Points Per Game', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rebounds Per Game', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assists Per Game', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            /*************   team     ***************/
            ['name' => 'Team Wins', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Team Losses', 'input_type' => 'number', 'type' => 'team', 'sport_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Tennis

            /*************   individual     ***************/
            ['name' => 'Ranking Position', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Matches Won', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Matches Lost', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aces', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Double Faults', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Swimming

            /*************   individual     ***************/
            ['name' => 'Best Time (100m Freestyle)', 'input_type' => 'time', 'type' => 'individual', 'sport_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Best Time (200m Freestyle)', 'input_type' => 'time', 'type' => 'individual', 'sport_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Total Medals Won', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Events Participated', 'input_type' => 'number', 'type' => 'individual', 'sport_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

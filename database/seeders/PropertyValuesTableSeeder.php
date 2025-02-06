<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_values')->insert([
            // Football  Player Attributes
            ['userable_type' => 'App\Models\Player', 'userable_id' => 1, 'property_id' => 1, 'content' => 'Striker', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 1, 'property_id' => 2, 'content' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 1, 'property_id' => 3, 'content' => '25', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 1, 'property_id' => 4, 'content' => '12', 'created_at' => now(), 'updated_at' => now()],

            // Football Team Attributes
            ['userable_type' => 'App\Models\Team', 'userable_id' => 1, 'property_id' => 5, 'content' => '60', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Team', 'userable_id' => 1, 'property_id' => 6, 'content' => '20', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Team', 'userable_id' => 1, 'property_id' => 7, 'content' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Team', 'userable_id' => 1, 'property_id' => 8, 'content' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Team', 'userable_id' => 1, 'property_id' => 9, 'content' => '2', 'created_at' => now(), 'updated_at' => now()],

            // Basketball Player Attributes
            ['userable_type' => 'App\Models\Player', 'userable_id' => 2, 'property_id' => 10, 'content' => 'Point Guard', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 2, 'property_id' => 11, 'content' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 2, 'property_id' => 12, 'content' => '18.2', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 2, 'property_id' => 13, 'content' => '7.5', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 2, 'property_id' => 14, 'content' => '5.3', 'created_at' => now(), 'updated_at' => now()],

            // Tennis Player Attributes
            ['userable_type' => 'App\Models\Player', 'userable_id' => 3, 'property_id' => 15, 'content' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 3, 'property_id' => 16, 'content' => '45', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 3, 'property_id' => 17, 'content' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 3, 'property_id' => 18, 'content' => '230', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 3, 'property_id' => 19, 'content' => '12', 'created_at' => now(), 'updated_at' => now()],

            // Swimming Player Attributes
            ['userable_type' => 'App\Models\Player', 'userable_id' => 4, 'property_id' => 20, 'content' => '00:48:52', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 4, 'property_id' => 21, 'content' => '01:46:89', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 4, 'property_id' => 22, 'content' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['userable_type' => 'App\Models\Player', 'userable_id' => 4, 'property_id' => 23, 'content' => '12', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            [
                'imageable_id'   => 1,
                'imageable_type' => 'App\\Models\\User',
                'name'           => 'images/user_default.jpg',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}

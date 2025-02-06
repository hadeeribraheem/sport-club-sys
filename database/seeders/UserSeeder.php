<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //(team_id initially null)
        DB::table('users')->insert([
            // Admin
            [
                'full_name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 30,
                'role_id' => 1,
                'team_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Coaches
            ['full_name' => 'John Doe', 'email' => 'coach1@example.com', 'password' => Hash::make('password'), 'age' => 40, 'role_id' => 2, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Mike Smith', 'email' => 'coach2@example.com', 'password' => Hash::make('password'), 'age' => 38, 'role_id' => 2, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Alice Johnson', 'email' => 'coach3@example.com', 'password' => Hash::make('password'), 'age' => 45, 'role_id' => 2, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Captains
            ['full_name' => 'David Brown', 'email' => 'captain1@example.com', 'password' => Hash::make('password'), 'age' => 28, 'role_id' => 3, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Chris Evans', 'email' => 'captain2@example.com', 'password' => Hash::make('password'), 'age' => 29, 'role_id' => 3, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],

            // Players
            ['full_name' => 'James Lee', 'email' => 'player1@example.com', 'password' => Hash::make('password'), 'age' => 24, 'role_id' => 4, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Robert Clark', 'email' => 'player2@example.com', 'password' => Hash::make('password'), 'age' => 26, 'role_id' => 4, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Kevin White', 'email' => 'player3@example.com', 'password' => Hash::make('password'), 'age' => 22, 'role_id' => 4, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Andrew Scott', 'email' => 'player4@example.com', 'password' => Hash::make('password'), 'age' => 25, 'role_id' => 4, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Emily Davis', 'email' => 'player5@example.com', 'password' => Hash::make('password'), 'age' => 23, 'role_id' => 4, 'team_id' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

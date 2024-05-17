<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Manajer',
            'email' => 'manajer@email.com',
            'password' => Hash::make('12345'),
            'role' => 'manager',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Direktur',
            'email' => 'direktur@email.com',
            'password' => Hash::make('12345'),
            'role' => 'director',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

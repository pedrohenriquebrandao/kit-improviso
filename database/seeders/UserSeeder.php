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
        DB::table('users')->insert([
            'name' => 'Pedro',
            'email' => 'pedro.brandao@gmail.com',
            'password' => Hash::make('cuca123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Lucas',
            'email' => 'lucas.santana@gmail.com',
            'password' => Hash::make('cuca123'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jane UserAdmin',
            'email' => 'jane@example.com',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'name' => 'Bob Moderator',
            'email' => 'bob@example.com',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'name' => 'Susan ThemeAdmin',
            'email' => 'susan@example.com',
            'password' => Hash::make('password')
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator'
        ]);
        DB::table('roles')->insert([
            'name' => 'Moderator'
        ]);
        DB::table('roles')->insert([
            'name' => 'Theme Manager'
        ]);
    }
}

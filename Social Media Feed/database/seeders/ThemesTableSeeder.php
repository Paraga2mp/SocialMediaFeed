<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cerulean',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cerulean/bootstrap.min.css',
            'user_id' => 1,
        ]);
        
        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cyborg/bootstrap.min.css',
            'user_id' => 2,
        ]);

        DB::table('themes')->insert([
            'name' => 'Minty',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/minty/bootstrap.min.css',
            'user_id' => 3,
        ]);
    }
    
}

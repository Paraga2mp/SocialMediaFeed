<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Seeder Post',
            'image_url' => 'https://www.nscc.ca/img/home/slider/hp-carousel-jan-2021-start.jpg',
            'caption' => 'Test Post',
            'user_id'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'Second Post',
            'image_url' => 'https://www.nscc.ca/convocation/img/masthead-images/masthead-convocation-2020.jpg',
            'caption' => 'NSCC Convocation 2020',
            'user_id'=> 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

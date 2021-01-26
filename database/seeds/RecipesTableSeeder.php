<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'title'=> 'sushi',
                'body' => 'fish, rice, seaweed',
                'user_id' => '1'
            ],
            [
                'title'=> 'korean noodles',
                'body' => 'paprika, chilli, noodles, tobokki',
                'user_id' => '2'
            ]
        ]);
    }
}

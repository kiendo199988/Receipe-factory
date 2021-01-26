<?php

use Illuminate\Database\Seeder;

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
            [
                'name'=> 'Trang',
                'email' => 'trangtuty2209@gmail.com',
                'password' => bcrypt('secret'),
                'role' => 'admin'
            ],
            [
                'name'=> 'Kien',
                'email' => 'kiendo99@gmail.com',
                'password' => bcrypt('secret'),
                'role' => 'admin'
            ]
        ]);
    }
}

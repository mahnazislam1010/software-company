<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'karim',
            'email' => 'karim@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'rafia',
            'email' => 'rafia@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}

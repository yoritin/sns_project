<?php

use Carbon\Carbon;
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
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('testuser'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);
    }
}

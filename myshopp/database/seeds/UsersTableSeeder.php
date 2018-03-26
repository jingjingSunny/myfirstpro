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
        //
        for($i=1;$i<=100;$i++){
        	DB::table('users')->insert([
            'username' => str_random(10),
            'password' => str_random(50),
            'status'=>rand(0, 1),
            'auth'=>rand(2, 3),
        	]);
        }
    }
}

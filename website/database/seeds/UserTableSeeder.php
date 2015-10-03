<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->delete();
		
		User::create(array('name' => 'test', 'email' => 'test@test.fr', 'password' => Hash::make('test')));
    }
}

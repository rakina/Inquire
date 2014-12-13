<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		
		User::create(array(
			'username' => 'rakina',
			'password' => Hash::make('hehe'),
		));
		User::create(array(
			'username' => 'johndoe',
			'password' => Hash::make('doe'),
		));
	}

}
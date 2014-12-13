<?php

class ThreadsSeeder extends Seeder
{

	public function run()
	{
		//DB::table('threads')->delete();
		Thread::create(array(
			'user_id' => 1,
			'judul' => 'pertamax',
			'isi' => 'coba coba nih',
		));
		Thread::create(array(
			'user_id' => 1,
			'judul' => 'keduax',
			'isi' => 'coba coba lagi nih',
		));

		Comment::create(array(
			'user_id' => 1,
			'thread_id' => 1,
			'isi' => 'coba comment nih',
		));
	}

}
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
			'tag' => 'general',
		));
		Thread::create(array(
			'user_id' => 1,
			'judul' => 'keduax',
			'isi' => 'coba coba lagi nih',
			'tag' => 'ppw',
		));
		Thread::create(array(
			'user_id' => 2,
			'judul' => 'confidence interval itu apa ya?',
			'isi' => 'dari awal aku tak pernah tau statprob itu apa ~',
			'tag' => 'statprob',
		));

		Comment::create(array(
			'user_id' => 1,
			'thread_id' => 1,
			'isi' => 'coba comment nih',
		));
	}

}
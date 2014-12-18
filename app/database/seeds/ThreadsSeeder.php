<?php

class ThreadsSeeder extends Seeder
{

	public function run()
	{
		//DB::table('threads')->delete();
		Thread::create(array(
			'user_id' => 1,
			'judul' => 'pertamax?',
			'isi' => 'first question ever!',
			'tag' => 'general',
		));
		
		Thread::create(array(
			'user_id' => 2,
			'judul' => 'confidence interval itu apa ya?',
			'isi' => 'dari awal aku tak pernah tau statprob itu apa ~',
			'tag' => 'statprob',
		));
		Thread::create(array(
			'user_id' => 0,
			'judul' => 'Cara pake hapsim gimana ya?',
			'isi' => 'hapsim :(',
			'tag' => 'pok',
			'file_url' => 'uploads/HA71dedD/hapsim.exe',
		));
		Thread::create(array(
			'user_id' => 1,
			'judul' => 'Laravel atau Yii?',
			'isi' => 'galau mau pake apa :(',
			'tag' => 'ppw'
		));

		Thread::create(array(
			'user_id' => 1,
			'judul' => 'Selama ini kita belajar apa sih?',
			'isi' => '#RIPMatdas2',
			'tag' => 'matdas2'
		));

		Comment::create(array(
			'user_id' => 0,
			'thread_id' => 4,
			'isi' => 'ya laravel lah...',
		));
		Comment::create(array(
			'user_id' => 1,
			'thread_id' => 1,
			'isi' => 'coba comment nih',
		));
	}

}
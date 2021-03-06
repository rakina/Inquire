<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('comments', function($t) {
                $t->increments('id');
                $t->integer('user_id');
                $t->integer('thread_id');
                $t->integer('vote')->default(0);
                $t->text('isi');
                $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('comments');
	}

}

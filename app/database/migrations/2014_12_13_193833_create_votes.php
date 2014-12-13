<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('votes', function($t) {
                $t->increments('id');
                $t->integer('user_id');
                $t->integer('comment_id')->default(0);
                $t->integer('thread_id')->default(0);
                $t->integer('type');
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
		Schema::drop('votes');
	}

}

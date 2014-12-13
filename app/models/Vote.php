<?php

class Vote extends Eloquent{

	public function user()
	{
		return $this -> belongsTo('User');
	}
	
	public function thread(){
		return $this -> belongsTo('Thread');
	}

	public function comment(){
		return $this -> belongsTo('Comment');
	}
}
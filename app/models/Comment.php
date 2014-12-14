<?php

class Comment extends Eloquent{

	public function thread()
	{
		return $this ->belongsTo('Thread');
	}
	
	public function votes(){
		return $this -> hasMany('Vote');
	}
}
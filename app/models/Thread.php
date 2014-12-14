<?php

class Thread extends Eloquent{
	
	public function comments()
	{
		return $this -> hasMany('Comment');
	}
	
	public function votes(){
		return $this -> hasMany('Vote');
	}
}
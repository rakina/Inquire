<?php

class Thread extends Eloquent{
	
	public function comments()
	{
		return $this -> hasMany('Comment');
	}
	
	public function vote(){
		return $this -> hasMany('Vote');
	}
}
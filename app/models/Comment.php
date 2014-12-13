<?php

class Comment extends Eloquent{

	public function thread()
	{
		return $this >belongsTo('Thread');
	}
	
}
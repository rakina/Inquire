<?php

class ThreadController extends Controller {

	/**
	 * 
	 *
	 * @return 
	 */
	public function showThread(Thread $thread)
    {
        $comments = $thread->comments()->get();
        return $thread->isi;
        //$this->layout->title = $thread->title;
        //$this->layout->main = View::make('home')->nest('content', 'posts.single', compact('post', 'comments'));
    }
}

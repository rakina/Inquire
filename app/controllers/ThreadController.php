<?php

class ThreadController extends Controller {

	/**
	 * 
	 *
	 * @return 
	 */
	public function showThread(Thread $thread)
    {
        $comments = $thread->comments()->orderBy('vote','desc')->get();
        return View::make('thread.show')->nest('commentscontent', 'comment.show', compact('comments','thread'))->with('thread',$thread);
        //$this->layout->title = $thread->title;
        //$this->layout->main = View::make('home')->nest('content', 'posts.single', compact('post', 'comments'));
    }


    public function newThread(){
    	$data = Input::all();
    	$rules = array('title'=>'required','content'=>'required');
    	$validator = Validator::make($data, $rules);
    	if ($validator->fails()) {
			return Redirect::route('thread.new')
				->withErrors($validator) // send back all errors to the login form
				->withInput($data); // send back the input (not the password) so that we can repopulate the form
		}
		if (Input::hasFile('file'))
		{
			$file = Input::file('file');
			$filename = $file->getClientOriginalName();
		    $destinationPath = 'uploads/'.str_random(8);

			if ($file->getSize() > 5 * 1024 * 1024){
				return Redirect::route('thread.new')
				->withErrors(array("file"=>"Maximum file size is 5 MB."))
				->withInput($data); 
			}
			if (strlen($destinationPath.$filename) >= 255){
				return Redirect::route('thread.new')
				->withErrors(array("file"=>"File name is too long."))
				->withInput($data); 
			}

			$uploadSuccess = $file->move($destinationPath, $filename);
			if( $uploadSuccess );
			else {
			   return Redirect::route('thread.new')
				->withErrors(array("file"=>"File upload failed."))
				->withInput($data); 
			}
		}
		
		$thread = new Thread;
		$thread->judul = $data['title'];
		$thread->isi = Purifier::clean($data['content']);
		$thread->tag = $data['tag'];
		if (isset($data['anonymity']) && $data['anonymity'] == 'on')
			$thread->user_id = 0;
		else
			$thread->user_id = Auth::user()->id;

		if (Input::hasFile('file')) $thread->file_url = $destinationPath."/".$filename;
		$thread->save();
		return Redirect::route("thread.show",$thread->id);
    }
    public function deleteThread(Thread $thread){
    	$comments = $thread->comments();
    	$votes = $thread->votes();
    	$votes->delete();
    	$comments->delete();
    	$thread->delete();
    	return Redirect::route("home")->with("flash_notice","Successfully deleted question.");
    }
    public  function newComment(){
    	$data = Input::all();
    	$threadId = $data['thread'];
    	$data = Input::all();
    	$rules = array('ccontent'=>'required');
    	$validator = Validator::make($data, $rules);
    	if ($validator->fails()) {
			return Redirect::route('thread.show',$threadId)
				->withErrors($validator) // send back all errors to the login form
				->withInput($data); // send back the input (not the password) so that we can repopulate the form
		}
    	$comment = new Comment;
    	$comment->thread_id = $threadId;
    	$comment->isi = Purifier::clean($data['ccontent']);
    	if (isset($data['anonymity']) && $data['anonymity'] == 'on')
			$comment->user_id = 0;
		else
			$comment->user_id = Auth::user()->id;
    	$comment->save();
    	return Redirect::route("thread.show",$threadId);
    }
     public function deleteComment(Comment $comment){
    	$cvotes = $comment->votes();
    	$cvotes->delete();
    	$comment->delete();
    	return Redirect::back()->with("flash_notice","Successfully deleted answer.");
    }
    public function voteThread(){

		$data = Input::all();
		if ($data['current'] > 0)
			$data['current'] = 1;
		if ($data['current'] < 0)
			$data['current'] = -1;
		if ($data['type'] > 0)
			$data['type'] = 1;
		if ($data['type'] < 0)
			$data['type'] = -1;
		$thread = Thread::whereId($data['id'])->get()[0];
		$thread->vote += $data['type'];
		$thread->vote -= $data['current'];
		
		if (count($thread->votes()->whereUserId(Auth::user()->id)->get())  > 0){
			$vote = $thread->votes()->whereUserId(Auth::user()->id)->get()[0];
		}
		else{
			$vote = new Vote;
		}
		$vote->user_id = Auth::user()->id;
		$vote->thread_id = $data['id'];
		$vote->type = $data['type'];
		$vote->save();
		$thread->save();	
		return $thread->vote;
    }

    public function voteComment(){

		$data = Input::all();
		if ($data['current'] > 0)
			$data['current'] = 1;
		if ($data['current'] < 0)
			$data['current'] = -1;
		if ($data['type'] > 0)
			$data['type'] = 1;
		if ($data['type'] < 0)
			$data['type'] = -1;
		$comment = Comment::whereId($data['id'])->get()[0];
		$comment->vote += $data['type'];
		$comment->vote -= $data['current'];
		
		if (count($comment->votes()->whereUserId(Auth::user()->id)->get())  > 0){
			$vote = $comment->votes()->whereUserId(Auth::user()->id)->get()[0];
		}
		else{
			$vote = new Vote;
		}
		$vote->user_id = Auth::user()->id;
		$vote->comment_id = $data['id'];
		$vote->thread_Id = $data['threadId'];
		$vote->type = $data['type'];
		$vote->save();
		$comment->save();	
		return $comment->vote;
    }
}

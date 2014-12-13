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
        return View::make('showthread')->nest('commentscontent', 'showcomments', compact('comments'))->with('thread',$thread);
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
		$thread->isi = $data['content'];
		$thread->user_id = Auth::user()->id;
		if (Input::hasFile('file')) $thread->file_url = $destinationPath."/".$filename;
		$thread->save();
		return Redirect::to("/thread/".$thread->id);
    }
}

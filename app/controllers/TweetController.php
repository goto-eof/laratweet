<?php

class TweetController extends \BaseController
{


    public function postPost()
    {
        $validator = Validator::make(Input::all(), array('tweet' => 'required|min:1|max:140'));
        if ($validator->fails())
            return Redirect::to('user/profile/' . Auth::user()->username)->withInput()->with('errorMessage', $validator->messages()->first());

        $tweet = new Tweet;
        $tweet->user_id = Auth::id();
        $tweet->text = Input::get('tweet');
        $tweet->status = 'published';

        if (!$tweet->save())
            return Redirect::to('user/profile/' . Auth::user()->username)->withInput()->with('errorMessage', 'Internal error.');

        return Redirect::to('user/profile/' . Auth::user()->username);
    }


}
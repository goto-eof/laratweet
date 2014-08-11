<?php

class TweetController extends \BaseController
{


    public function postPost()
    {
        $validator = Validator::make(Input::all(), array('tweet' => 'required|min:1|max:140'));
        if ($validator->fails())
            Redirect::to('user/profile')->withInput()->with('errorMessage', $validator->messages()->first());
        //$reflector = new ReflectionClass("Tweet");$fn = $reflector->getFileName();dd($fn);
        $tweet = new Tweet;
        $tweet->user_id = Auth::id();
        $tweet->text = Input::get('tweet');
        $tweet->status = 'published';

        if (!$tweet->save())
            Redirect::to('user/profile')->withInput()->with('errorMessage', 'Internal error.');

        $tweets = User::find(Auth::user()->id)->tweets;
        return Redirect::to('user/profile')->with(array('errorMessage' => 'Published!'))->with('tweets', $tweets);
    }


}
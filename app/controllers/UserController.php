<?php

class UserController extends \BaseController
{


    public function __construct()
    {
        parent::__construct();
        // Effettua un controllo CSRF sui seguenti tipi di richieste post/put/patch/delete
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
        $this->beforeFilter('auth', array('except' => array('getLogin', 'getRegister', 'postLogin', 'postRegister')));
    }

    /**
     * redirects to the login page
     * @return string
     */
    public function getIndex()
    {
        return Redirect::to('user/login');
    }

    /**
     * login page
     * @return mixed
     */
    public function getLogin()
    {

        return View::make('login', array('title' => 'Login | LaraTweet'));

    }

    /**
     * login to LaraTweet
     */
    public function postLogin()
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required|min:8'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $exceptArr = array('password');
            if ($validator->messages()->has('username'))
                $exceptArr[] = 'username';
            return Redirect::to('user/login')->with('errorMessage', $validator->messages()->first())->withInput(Input::except($exceptArr));
        }

        // tries to authenticate
        if (!Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')), true))
            return Redirect::to('user/login')->with('errorMessage', 'Inexistent username or invalid password');

        return Redirect::intended('user/profile/' . Auth::user()->username)->with('username', Input::get('username'));

    }

    /**
     * Returns the sign in page
     * @return mixed
     */
    public function getRegister()
    {
        return View::make('register', array('title' => 'Register | LaraTweet'));
    }

    /**
     * Stores a new user in the Users table
     */
    public function postRegister()
    {
        $rules = array(
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        );

        $validator = Validator::make(Input::all(), $rules);
        // list of the fields that have to be blank if an exception is encountered

        if ($validator->fails()) {
            // check in which field we have errors and add their name to the blank fields array
            $exceptArr = array('password');
            if ($validator->messages()->has('email'))
                $exceptArr[] = 'email';
            ($validator->messages()->has('username')) ? $exceptArr[] = 'username' : null;

            return Redirect::to('user/register')->with('errorMessage', $validator->messages()->first())->withInput(Input::except($exceptArr));
        }
        $user = new User;
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');

        if (!$user->save())
            return Redirect::to('user/register')->with('errorMessage', 'Internal error')->withInput(Input::except($exceptArr));

        if (!Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
            return Redirect::to('user/register')->with('errorMessage', 'Internal error');

        return Redirect::intended('user/profile');
    }

    public function getProfile($username = "")
    {
        if (empty($username)) {
            return Redirect::to('user/profile/' . Auth::user()->username);
        }

        $profile = User::getProfileByUsername($username);
        if (empty($profile))
            App::abort(404);
        $profile = $profile[0];
        //dd($profile);

        $tmp = User::isFollowingUsername(Auth::user()->username, $username);
        $youAreFollowing = $tmp[0]->n == 1 ? true : false;
        //dd($tmp);


        //$queries = DB::getQueryLog();$last_query = end($queries);dd($last_query);//dd($queries);exit();
        $tweets = User::getAllTweetsByUsername($username);
        return View::make('profile')
            ->with('title', Str::title($username) . '\'s Profile | LaraTweet')
            ->with('tweets', $tweets)
            ->with('youAreFollowing', $youAreFollowing)
            ->with('profile', $profile)
            ->with('username', $username);
    }


    public function getAll()
    {
        $users = User::getProfiles();
        return View::make('users')->with('users', $users)->with('title', 'Users | LaraTweet');
    }


    public function anyFollow($other)
    {
        $status = User::followUsername(Auth::user()->username, $other);
        if ($status)
            return Redirect::back();
        return Redirect::to('/');
    }

    public function anyUnfollow($other)
    {
        $status = User::unfollowUsername(Auth::user()->username, $other);
        if ($status)
            return Redirect::back();
        return Redirect::to('/');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }


    public function getTimeline()
    {
        $tweets = User::getAllFriendsTweetsByUsername(Auth::user()->username);
        return View::make('timeline')->with('title', 'Timeline | LaraTweet')->with('tweets', $tweets);
    }

}

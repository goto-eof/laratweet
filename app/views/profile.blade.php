@extends('layouts.base')


@section('body')
{{-- @if (Auth::check()) --}}
<div class="inner cover">

    <div class="row profile">
        <div class="col-xs-6 col-md-4">
            <div>
                <img class="img-circle" src="{{ !empty($profile->img_uri) ? $profile->img_uri:asset('img/no_photo_128.png') }}">
            </div>

            <div class="username">{{{ '@'.$profile->username }}}</div>
            <div>{{{ $profile->email }}}</div>
            <div>
                @if( $profile->username!=Auth::user()->username)
                    @if(!$youAreFollowing)
                        {{ Form::open(array('url' => url('user/follow/'.$profile->username), 'method'=> 'POST', 'class' => 'form-signin')) }}
                        {{ Form::submit('Follow', array('class' => 'btn btn-lg btn-primary btn-block btn-success')) }}
                        {{ Form::close() }}
                    @else
                        {{ Form::open(array('url' => url('user/unfollow/'.$profile->username), 'method'=> 'POST', 'class' => 'form-signin')) }}
                        {{ Form::submit('Unfollow', array('class' => 'btn btn-lg btn-primary btn-block btn-danger')) }}
                        {{ Form::close() }}
                    @endif
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-md-8">
            <div>
                {{{ !empty($profile->bio) ? $profile->bio : 'Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim.' }}}
            </div>
            @if ($profile->username===Auth::user()->username)
            <hr>
            <div>
                {{ Form::open(array('url'=>url('tweet/post'), 'method' => 'POST', 'class' => 'form-signin')) }}
                <h3>What are you thinking?</h3>

                <p>
                    @if (Session::has('errorMessage'))
                        {{ Session::get('errorMessage') }}
                    @endif
                </p>
                {{ Form::textarea('tweet',null, array('class'=>'form-control', 'id'=>'tweet-input', 'maxlength'=>'140'))}}
                {{ Form::submit('Publish', array('class'=>'btn btn-lg btn-primary btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
        @endif
    </div>
    <!-- fine row -->


    <div class="row">
        <hr>
        {{-- don't try this at home --}}
        @if (Session::has('tweets') ? $tweets = Session::get('tweets') : $tweets)
        @endif

        @foreach($tweets as $tweet)
        <div class="tweet">
            <div class="col-xs-6 col-md-4">
                <div><img class="img-circle" src="{{ asset('img/no_photo_128.png') }}"></div>
                <div><strong>{{{ '@'.$tweet->username }}}</strong></div>
            </div>
            <div class="col-xs-12 col-md-8" style="text-align: left;">
                {{{ $tweet->text }}}
                <div class="text-align-right">{{
                    \Carbon\Carbon::createFromTimeStamp(strtotime($tweet->created_at))->diffForHumans() }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
{{-- @endif --}}

@stop
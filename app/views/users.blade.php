@extends('layouts.base')

@section('body')
<div class="inner cover">
    @foreach($users as $user)
    <div class="profile">
        <div class="col-xs-6 col-md-4">
            <div><a href="{{ url('user/profile/'.$user->username) }}"><img class="img-circle" src="{{ asset('img/no_photo_128.png') }}" style="width: 48px;height:48px;"></a></div>
            <div class="username"><a href="{{ url('user/profile/'.$user->username) }}">{{{ '@'.$user->username }}}</a></div>
        </div>
        <div class="col-xs-12 col-md-8">
            {{{ empty($user->bio) ? 'Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' : $user->bio }}}
        </div>
    </div>
    @endforeach
</div>
@stop
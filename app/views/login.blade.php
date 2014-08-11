@extends('layouts.base')

@section('body')

<div class="inner cover">

{{ Form::open(array('url' => url('user/login'), 'method'=> 'POST', 'class' => 'form-signin')) }}
    <h2 class="form-signin-heading"><span class="glyphicon glyphicon-lock"></span> Login</h2>
    @if(Session::has('errorMessage'))
        <p>{{ Session::get('errorMessage') }}</p>
    @endif
    {{ Form::text('username','', array('class' => 'form-control', 'placeholder' =>'Username', 'required' => 'true' )) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' =>'Password', 'required' => 'true'  )) }}
    {{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
<!--
<form method="POST" action="http://localhost/laratweet/public/user/login" accept-charset="UTF-8" class="form-signin">
    <h2 class="form-signin-heading"><span class="glyphicon glyphicon-lock"></span> Login</h2>
    <input class="form-control" placeholder="Username" required="true" name="username" type="text" value="">
    <input class="form-control" placeholder="Password" required="true" name="password" type="password" value="">
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
</form>
-->

</div>
    @stop
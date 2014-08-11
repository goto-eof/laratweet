@extends('layouts.base')

@section('body')

{{ Form::open(array('url' => url('user/register'), 'method'=> 'POST', 'class' => 'form-signin')) }}
    <h2 class="form-signin-heading"><span class="glyphicon glyphicon-pencil"></span> Registration form</h2>
    @if(Session::has('errorMessage'))
        <p>{{ Session::get('errorMessage') }}</p>
    @elseif (isset($errorMessage))
        <p>{{ $errorMessage }}</p>
    @endif

    {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' =>'Username', 'required' => 'true' )) }}
    {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' =>'E-Mail address', 'required' => 'true'  )) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' =>'Password', 'required' => 'true'  )) }}
    {{ Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop
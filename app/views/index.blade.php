@extends('layouts.base')

@section('body')
<div class="inner cover">

    <h1 class="cover-heading">Share your thoughts with conciseness!</h1>
    <p class="lead">Laratweet is a web application that allows you to publish your deepest thoughts and interact with
        the thoughts of others. Laratweet is an example of application based on the Laravel framework.</p>
    <p class="lead"><a href="{{ asset('user/register') }}" class="btn btn-lg btn-default"><span
                class="glyphicon glyphicon-pencil"></span> Register</a>
    </p>
</div>
@stop
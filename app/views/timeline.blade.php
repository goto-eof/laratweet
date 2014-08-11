@extends('layouts.base')

@section('body')
<div class="inner cover">
    @foreach($tweets as $tweet)
    <div style="min-height: 100px;" class="tweet">
        <div class="col-xs-6 col-md-4">
            <div>
                <a href="{{ url('user/profile/'.$tweet->username) }}">
                    <img class="img-circle"
                         src="{{ asset('img/no_photo_128.png') }}"
                         style="width: 48px;height:48px;">
                </a>
            </div>
            <div class="username">
                <a href="{{ url('user/profile/'.$tweet->username) }}">{{ '@'.$tweet->username }}</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-8" style="text-align: left;">
            {{ $tweet->text }}
            <div class="text-align-right">{{
                \Carbon\Carbon::createFromTimeStamp(strtotime($tweet->created_at))->diffForHumans() }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop
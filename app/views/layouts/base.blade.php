<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>

    @include('includes.head')

</head>

<body>
<div class="site-wrapper">

    <div class="site-wrapper-inner  {{ Request::is('/') || Request::is('user/login') || Request::is('user/register') ? 'vertcenter' : '' }}">
        <div class="cover-container">

            @include('includes.header')

            {{-- sto definendo una sezione vuota denominata "body" --}}

            {{--@yield('body')--}}

            {{-- posso utilizzare anche un altro metodo per ottenere lo stesso risultato --}}

            @section('body')
            @show

            @include('includes.footer')
        </div>
    </div>
</div>
@include('includes.before_body_close')
</body>
</html>

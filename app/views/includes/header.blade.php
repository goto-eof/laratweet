<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand"><a href="{{ (Auth::check())?url('user/all'):url('/') }}"><span class="glyphicon glyphicon-bullhorn mirror"></span> Laratweet</a></h3></h3>
        <ul class="nav masthead-nav">

            @if(!Auth::check())
                <li {{ Request::is('/')?'class="active"':'' }}><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li {{ Request::is('user/login')?'class="active"':'' }}><a href="{{ url('user/login') }}"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
            <!--
            <li {{ Request::is('user/register')?'class="active"':'' }}><a href="{{ url('user/register') }}"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
            -->
            @else
                <li {{ Request::is('user/all')?'class="active"':'' }}><a href="{{ url('user/all') }}"><span class="glyphicon glyphicon-globe"></span> People</a></li>
                <li {{ Request::is('user/timeline')?'class="active"':'' }}><a href="{{ url('user/timeline') }}"><span class="glyphicon glyphicon-list-alt"></span> Timeline</a></li>
                <li {{ Request::is('user/profile')?'class="active"':'' }}><a href="{{ url('user/profile') }}"><span class="glyphicon glyphicon-user"></span> Me</a></li>
                <li><a href="{{ url('user/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            @endif
        </ul>
    </div>
</div>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header navbar-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ action('MeetingController@index') }}">
                <h1><i class="fa fa-university fa-2x"></i>Webmeeting</h1>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}"><i class="fa fa-list fa-fw"></i>{{ trans('meetings.list') }}</a></li>
                @if (Cas::isAuthenticated())
                    <li><a href="{{ url('/mymeetings') }}"><i class="fa fa-list fa-fw"></i>{{ trans('meetings.myMeetings') }}</a></li>
                @endif
                <li><a href="{{ url('/meeting/create') }}"><i class="fa fa-plus fa-fw"></i>{{ trans('meetings.create') }}</a></li>
                @if (Cas::isAuthenticated())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{{ Auth::user()->full_name }}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i>{{ trans('meetings.logout') }}</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/login"><i class="fa fa-sign-in fa-fw"></i>{{ trans('meetings.login') }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<section id="intro-small" class="intro">
</section>

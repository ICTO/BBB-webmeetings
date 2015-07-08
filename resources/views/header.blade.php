<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('MeetingController@index') }}">BBB</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-bbb">
            <ul class="nav navbar-nav">
                <li><a href="{{ action('MeetingController@index') }}">{{ trans('meetings.list') }}</a></li>
                <li><a href="{{ action('MeetingController@indexOwnMeetings') }}">{{ trans('meetings.myMeetings') }}</a></li>
                <li><a href="{{ action('MeetingController@create') }}">{{ trans('meetings.create') }}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Cas::isAuthenticated())
                    <li><a href="/logout">{{ trans('meetings.logout') }}</a></li>
                @else
                    <li><a href="/login">{{ trans('meetings.login') }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

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
                <li><a href="{{ action('MeetingController@index') }}">List meetings</a></li>
                <li><a href="{{ action('MeetingController@indexOwnMeetings') }}">My meetings</a></li>
                <li><a href="{{ action('MeetingController@create') }}">Create meeting</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Cas::isAuthenticated())
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@extends('app')

@section('content')
    <h1>{{ trans('meetings.myMeetings') }}</h1>

    @if (count($meetings) < 1)
        <div>{{ trans('meetings.noMyMeetings') }}</div>
    @else
        <table class="table table-striped">
            <thead>
            <td>#</td>
            <td>title</td>
            <td>admin</td>
            </thead>
        @foreach ($meetings as $meeting)
            <tr>
                <td>{{ $meeting->id }}</td>
                <td><a href="{{ action('MeetingController@show', [$meeting->id])}}">{{ $meeting->title}}</a></td>
                <td>
                    <a href="{{ action('MeetingController@edit', [$meeting->id])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a href="{{ action('MeetingController@delete', [$meeting->id])}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>
        @endforeach
        </table>
    @endif

@stop

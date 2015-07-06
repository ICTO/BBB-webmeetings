@extends('app')

@section('content')
    <h1>Meetings</h1>

    @foreach ($meetings as $meeting)
        <meeting>
            <h2>
                <a href="{{ action('MeetingController@show', [$meeting->id])}}">{{ $meeting->title}}</a>
            </h2>
        </meeting>
    @endforeach

@stop

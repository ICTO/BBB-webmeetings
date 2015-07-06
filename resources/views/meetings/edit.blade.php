@extends('app')

@section('content')
    <h1>Edit: {!! $meeting->title !!}</h1>

    <hr/>

    {!! Form::model($meeting, ['method' => 'PATCH', 'action' => ['MeetingController@update', $meeting->id]]) !!}

        @include('meetings.form', ['submitButton' => 'Update meeting'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

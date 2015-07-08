@extends('app')

@section('content')

    <h1>{{ $meeting->title }}</h1>

    <span>{{ $meeting->description }}</span><br />

    <span>{{ trans('meetings.creator') }} {{ $meeting->user->full_name }}</span><br />

    <span>{{ trans('meetings.join') }}</span>

    {!! Form::open(['url' => 'meeting/' . $meeting->id .'/join']) !!}

    <div class="form-group">
        {!! Form::label('username', trans('meetings.username')) !!}
        @if (Auth::check())
            {!! Form::text('username', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        @else
            {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('password', trans('meetings.password')) !!}
        {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'password']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit(trans('meetings.join'), ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop

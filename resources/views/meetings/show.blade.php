@extends('app')

@section('content')

    <meeting>
        <h1>{{ $meeting->title }}</h1>

        <div class="description">{{ $meeting->description }}</div>

        <div class="creator">{{ trans('meetings.creator') }} {{ $meeting->user->full_name }}</div>

        <div class="join-form-header"><h3>{{ trans('meetings.join') }}</h3></div>

        {!! Form::open(['url' => 'meeting/' . $meeting->id .'/join']) !!}

        <div class="form-group">
            {!! Form::label('username', trans('meetings.username')) !!}
            @if (Auth::check())
                {!! Form::text('username', Auth::user()->full_name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            @else
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('password', trans('meetings.password')) !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(trans('meetings.join'), ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}
        @include('errors.list')
    </meeting>
@stop

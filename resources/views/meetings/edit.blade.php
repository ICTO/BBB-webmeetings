@extends('app')

@section('content')
    <h1>Edit: {!! $meeting->title !!}</h1>

    <hr/>

    {!! Form::model($meeting, ['method' => 'PATCH', 'action' => ['MeetingController@update', $meeting->id]]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title for this meeting']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Meeting description']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('welcomeText', 'Welcome text:') !!}
            {!! Form::text('welcomeText', null, ['class' => 'form-control', 'placeholder' => 'Welcome text']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update meeting', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

    @include('errors.list')

@endsection

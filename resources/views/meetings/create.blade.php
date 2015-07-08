@extends('app')

@section('content')
    <h1>Create new meeting</h1>

    <hr/>

    {!! Form::open(['url' => 'meeting']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title for this meeting']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:',['class' => 'form-group-addon']) !!}
        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Meeting description']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('welcomeText', 'Welcome text:') !!}
        {!! Form::text('welcomeText', null, ['class' => 'form-control', 'placeholder' => 'Welcome text']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('moderatorPassword', 'Moderator password:') !!}
        {!! Form::password('moderatorPassword', null, ['class' => 'form-control', 'placeholder' => 'moderator']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('attendeePassword', 'Attendee password:') !!}
        {!! Form::password('attendeePassword', null, ['class' => 'form-control', 'placeholder' => 'attendee']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create meeting', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include('errors.list')
@stop

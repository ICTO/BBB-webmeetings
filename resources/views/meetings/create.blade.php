@extends('app')

@section('content')
    <h1>{{ trans('meetings.create') }}</h1>

    <hr/>

    {{ trans('meetings.createDescription') }}

    {!! Form::open(['url' => 'meeting']) !!}

    <div class="form-group">
        {!! Form::label('title', trans('meetings.title')) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('meetings.titlePlaceholder')]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', trans('meetings.description'),['class' => 'form-group-addon']) !!}
        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('meetings.descriptionPlaceholder')]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('welcomeText', trans('meetings.welcomeText')) !!}
        {!! Form::text('welcomeText', null, ['class' => 'form-control', 'placeholder' => trans('meetings.welcomeTextPlaceholder')]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('moderatorPassword', trans('meetings.moderatorPassword')) !!}
        {!! Form::password('moderatorPassword', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('attendeePassword', trans('meetings.attendeePassword')) !!}
        {!! Form::password('attendeePassword', null, ['class' => 'form-control', 'placeholder' => 'attendee']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit(trans('meetings.create'), ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include('errors.list')
@stop

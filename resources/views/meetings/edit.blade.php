@extends('app')

@section('content')
    <h1>{{ trans('meetings.edit') }} {!! $meeting->title !!}</h1>

    <hr/>

    {!! Form::model($meeting, ['method' => 'PATCH', 'action' => ['MeetingController@update', $meeting->id]]) !!}

        <div class="form-group">
            {!! Form::label('title', trans('meetings.title')) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description',trans('meetings.description')) !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('welcomeText', trans('meetings.welcomeText')) !!}
            {!! Form::text('welcomeText', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('moderatorAccessCode', trans('meetings.moderatorAccessCode')) !!}
            {!! Form::text('moderatorAccessCode', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('attendeeAccessCode', trans('meetings.attendeeAccessCode')) !!}
            {!! Form::text('attendeeAccessCode', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(trans('meetings.edit'), ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

    @include('errors.list')

@endsection

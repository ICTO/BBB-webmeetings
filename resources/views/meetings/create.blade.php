@extends('app')

@section('content')
    <h1>Create new meeting</h1>

    <hr/>

    {!! Form::open(['url' => 'meeting']) !!}

        @include('meetings.form', ['submitButton' => 'Create meeting'])

    {!! Form::close() !!}

    @include('errors.list')
@stop

@extends('app')

@section('content')

    <h1>{{ $meeting->title }}</h1>

    <span>{{ $meeting->description }}</span>


@stop

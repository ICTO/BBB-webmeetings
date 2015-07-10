@extends('app')

@section('content')
    <h1>{{ trans('meetings.meetings') }}</h1>

    <div id="meetings">
        <input v-model="search" type="text" class="form-control" placeholder="{{ trans('meetings.searchFilter') }}">

        <meeting v-repeat="meetings | filterBy search">
            <h2><a href="/meeting/@{{ id }}">@{{ title}}</a></h2>
            <div class="clearfix">
                <div class="creator pull-left">{{ trans('meetings.creator') }} @{{ user.full_name }}</div>
                <div class="created_at pull-right">@{{ updated_at }}</div>
            </div>
            <div class="body">@{{ description }}</div>
        </meeting>
    </div>

@stop

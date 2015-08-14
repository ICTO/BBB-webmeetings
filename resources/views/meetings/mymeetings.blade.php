@extends('app')

@section('content')
    <div id="mymeetings">
        <h1>{{ trans('meetings.myMeetings') }}</h1>

        @if (count($meetings) < 1)
            <div>{{ trans('meetings.noMyMeetings') }}</div>
        @else
            <input v-model="search" type="text" class="form-control" placeholder="{{ trans('meetings.searchFilter') }}">
            <table class="table table-striped">
                <thead>
                <td v-on="click:sortBy('id')" v-class="active: sortKey == 'id'">#</td>
                <td v-on="click:sortBy('title')" v-class="active: sortKey == 'title'">{{ trans('meetings.title') }}</td>
                <td v-on="click:sortBy('updated_at')" v-class="active: sortKey == 'updated_at'">{{ trans('meetings.lastedit') }}</td>
                <td>{{ trans('meetings.actions') }}</td>
                </thead>
                <tbody>
                    <tr v-repeat="meetings | filterBy search | orderBy sortKey reverse">
                        <td>@{{ id }}</td>
                        <td><a href="/meeting/@{{ id }}">@{{ title }}</a></td>
                        <td>@{{ updated_at }}</td>
                        <td>
                            <a href="/meeting/@{{ id }}/edit""><i class="fa fa-pencil-square-o fa-2x"></i></a>
                            <a href="/meeting/@{{ id }}/delete""><i class="fa fa-trash-o fa-2x"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@stop

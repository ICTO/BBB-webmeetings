@extends('app')

@section('content')
    <h1>{{ trans('meetings.meetings') }}</h1>

    <div id="meetings">
        <input v-model="search" type="text" class="form-control" placeholder="{{ trans('meetings.searchFilter') }}">

        <meeting v-repeat="meetings | filterBy search | paginate">
            <h2><a href="/meeting/@{{ id }}">@{{ title}}</a></h2>
            <div class="clearfix">
                <div class="creator pull-left small">{{ trans('meetings.creator') }} <a href="http://telefoonboek.ugent.be/simple?name=@{{ user.full_name }}">@{{ user.full_name }}</a></div>
                <div class="created_at pull-right small">@{{ updated_at }}</div>
            </div>
            <div class="body lead">@{{ description }}</div>
        </meeting>

        <ul class="pagination | filterBy search" v-if="totalPages > 1">
            <li v-repeat="pageNumber: totalPages" v-class="active: currentPage == pageNumber"><a href="#" v-on="click: setPage(pageNumber)">@{{ pageNumber+1 }}</a></li>
        </ul>
    </div>

@stop

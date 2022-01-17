@extends('Template::app')

@section('sidebar')

    @component('Template::components.sidebarItem')
        @slot('url', route('dashboard.home'))
        @slot('name', trans('dashboard.home'))
        @slot('icon', 'fas fa-tachometer-alt')
        @slot('routeActive', 'dashboard.home')
    @endcomponent

    @include('dashboard.users.partials.actions.sidebar')
    @include('dashboard.projects.partials.actions.sidebar')
    @include('dashboard.settings.partials.actions.sidebar')

@endsection


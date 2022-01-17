@extends('layouts.dashboard', ['title' => trans('projects.actions.create')])
@section('content')
    @component('Template::components.page')
        @slot('title', trans('projects.plural'))
        @slot('breadcrumbs', ['dashboard.projects.create'])

        {{ BsForm::resource('projects')->post(route('dashboard.projects.store'), ['files' => true]) }}
        @component('Template::components.box')
            @slot('title', trans('projects.actions.create'))

            @include('dashboard.projects.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('projects.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

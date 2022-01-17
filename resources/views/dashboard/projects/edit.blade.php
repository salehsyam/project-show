@extends('layouts.dashboard', ['title' => $project->name])
@section('content')
    @component('Template::components.page')
        @slot('title', $project->name)
        @slot('breadcrumbs', ['dashboard.projects.edit', $project])

        {{ BsForm::resource('projects')->putModel($project, route('dashboard.projects.update', $project), ['files' => true]) }}
        @component('Template::components.box')
            @slot('title', trans('projects.actions.edit'))

            @include('dashboard.projects.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('projects.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

@extends('layouts.dashboard', ['title' => trans('settings.actions.list')])
@section('content')
    @component('Template::components.page')
        @slot('title', trans('settings.plural'))
        @slot('breadcrumbs', ['dashboard.settings.index'])

        {{ BsForm::resource('settings')->post(route('dashboard.settings.store')) }}
        @component('Template::components.box')
            @slot('title', trans('settings.actions.list'))

            @include('dashboard.settings.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('settings.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

@extends('layouts.dashboard', ['title' => trans('projects.plural')])

@section('content')
    @component('Template::components.page')
        @slot('title', trans('projects.plural'))
        @slot('breadcrumbs', ['dashboard.projects.index'])

        @component('Template::components.table-box')
            @slot('title', trans('projects.actions.list'))
            @slot('tools')
                @include('dashboard.projects.partials.actions.filter')
                @include('dashboard.projects.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('projects.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('projects.attributes.category')</th>
                <th class="d-none d-md-table-cell">@lang('projects.attributes.location')</th>
                <th class="d-none d-md-table-cell">@lang('projects.attributes.area')</th>
                <th class="d-none d-md-table-cell">@lang('projects.attributes.user_id')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.projects.show', $project) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $project->name }}
                        </a>
                    </td>
                    <td class="d-none d-md-table-cell">
                        @lang('projects.categories.'.$project->category)
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{ $project->location }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{ $project->area }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.users.show', $project->user) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $project->user->name }}
                        </a>
                    </td>
                    <td style="width: 160px">
                        @include('dashboard.projects.partials.actions.show')
                        @include('dashboard.projects.partials.actions.edit')
                        @include('dashboard.projects.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('projects.empty')</td>
                </tr>
            @endforelse

            @if($projects->hasPages())
                @slot('footer')
                    {{ $projects->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection

@extends('layouts.dashboard', ['title' => $project->name])
@section('content')
    @component('Template::components.page')
        @slot('title', $project->name)
        @slot('breadcrumbs', ['dashboard.projects.show', $project])

        <div class="row">
            <div class="col-md-12">
                @component('Template::components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped">
                        <tr>
                            <th>@lang('projects.attributes.name')</th>
                            <td>{{ $project->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('projects.attributes.location')</th>
                            <td>{{ $project->location }}</td>
                        </tr>
                        <tr>
                            <th>@lang('projects.attributes.area')</th>
                            <td>{{ $project->area }}</td>
                        </tr>
                        @if(! empty($project->price))
                            <tr>
                                <th>@lang('projects.attributes.price')</th>
                                <td>{{ $project->price }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>@lang('projects.attributes.contact')</th>
                            <td>{{ $project->contact }}</td>
                        </tr>
                        <tr>
                            <th>@lang('projects.attributes.category')</th>
                            <td>@lang('projects.categories.'.$project->category)</td>
                        </tr>
                        <tr>
                            <th>@lang('projects.attributes.user_id')</th>
                            <td>
                                <a href="{{ route('dashboard.users.show', $project->user) }}"
                                    class="text-decoration-none text-ellipsis">
                                    {{ $project->user->name }}
                                 </a>
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('projects.attributes.created_at')</th>
                            <td>{{ $project->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th>@lang('projects.attributes.qr')</th>
                            <td>{!! QrCode::generate($project->id) !!}</td>
                        </tr>
                    </table>

                    @slot('footer')
                        @include('dashboard.projects.partials.actions.edit')
                        @include('dashboard.projects.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach($project->media as $image)
                        <div class="col-md-3">
                            <img src="{{ $image->getFullUrl() }}" alt="{{ $project->name }}" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endcomponent
@endsection

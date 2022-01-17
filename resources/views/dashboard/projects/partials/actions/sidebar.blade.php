
@component('Template::components.sidebarItem')
@slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Project::class])
@slot('url', route('dashboard.projects.index'))
@slot('name', trans('projects.plural'))
@slot('routeActive', '*projects*')
@slot('icon', 'fas fa-briefcase')
@slot('tree', [
    [
        'name' => trans('projects.actions.list'),
        'url' => route('dashboard.projects.index'),
        'can' => ['ability' => 'viewAny', 'model' => \App\Models\Project::class],
        'routeActive' => '*projects.index',
    ],
    [
        'name' => trans('projects.actions.create'),
        'url' => route('dashboard.projects.create'),
        'can' => ['ability' => 'create', 'model' => \App\Models\Project::class],
        'routeActive' => '*projects.create',
    ],
])
@endcomponent

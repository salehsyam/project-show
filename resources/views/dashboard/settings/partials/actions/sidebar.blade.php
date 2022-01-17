@component('Template::components.sidebarItem')
    @slot('name', trans('settings.plural'))
    @slot('icon', 'fa fa-cog')
    @slot('tree', [
        [
            'name' => trans('settings.actions.list'),
            'url' => route('dashboard.settings.index'),
            'urlActive' => route('dashboard.settings.index'),
        ],
    ])
@endcomponent

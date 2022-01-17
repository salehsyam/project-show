@can('view', $project)
    <a href="{{ route('dashboard.projects.show', $project) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan

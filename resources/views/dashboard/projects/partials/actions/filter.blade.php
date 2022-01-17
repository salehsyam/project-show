<button
    type="button"
   id="filter-popover"
   class="btn btn-outline-dark btn-sm">
    <i class="fas fa fa-fw fa-filter"></i>
</button>

<div id="popover-content" class="d-none">
    {{ BsForm::resource('projects')->get(null) }}
        {{ BsForm::text('name')->value(request('name')) }}

        {{ BsForm::text('category')->value(request('category')) }}

        {{ BsForm::text('location')->value(request('location')) }}

        {{ BsForm::text('area')->value(request('area')) }}

        {{ BsForm::select('category')
                ->options(trans('projects.categories'))
                ->value(request('category'))
                ->placeholder(trans('projects.select-type')) }}

        {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('projects.perPage')) }}

        <button type='submit' class='btn btn-primary btn-sm'>
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('projects.actions.filter')
        </button>

    {{ BsForm::close() }}
</div>

@push('scripts')
    <script>
        $('#filter-popover').popover({
            html: true,
            container: 'body',
            content: function () {
                return $("#popover-content").html();
            },
            placement: 'bottom',
            sanitize: false,
        });
    </script>
@endpush

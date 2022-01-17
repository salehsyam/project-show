{{ BsForm::text('name') }}
{{ BsForm::email('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}
@isset($user)
    @can('updateType', $user)
        {{ BsForm::select('type')->options(trans('users.types')) }}
    @endcan
@else
    {{ BsForm::select('type')->options(trans('users.types')) }}
@endisset

<?php

Breadcrumbs::for('dashboard.settings.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('settings.actions.list'), route('dashboard.settings.index'));
});

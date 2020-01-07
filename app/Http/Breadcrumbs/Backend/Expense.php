<?php

Breadcrumbs::register('admin.expenses.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.expenses.management'), route('admin.expenses.index'));
});

Breadcrumbs::register('admin.expenses.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.expenses.index');
    $breadcrumbs->push(trans('menus.backend.expenses.create'), route('admin.expenses.create'));
});

Breadcrumbs::register('admin.expenses.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.expenses.index');
    $breadcrumbs->push(trans('menus.backend.expenses.edit'), route('admin.expenses.edit', $id));
});

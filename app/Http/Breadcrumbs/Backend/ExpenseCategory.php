<?php

Breadcrumbs::register('admin.expensecategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.expensecategories.management'), route('admin.expensecategories.index'));
});

Breadcrumbs::register('admin.expensecategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.expensecategories.index');
    $breadcrumbs->push(trans('menus.backend.expensecategories.create'), route('admin.expensecategories.create'));
});

Breadcrumbs::register('admin.expensecategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.expensecategories.index');
    $breadcrumbs->push(trans('menus.backend.expensecategories.edit'), route('admin.expensecategories.edit', $id));
});

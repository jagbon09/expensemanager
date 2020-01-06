<?php
/**
 * ExpenseCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ExpenseCategory'], function () {
        Route::resource('expensecategories', 'ExpenseCategoriesController');
        //For Datatable
        Route::post('expensecategories/get', 'ExpenseCategoriesTableController')->name('expensecategories.get');
    });
    
});
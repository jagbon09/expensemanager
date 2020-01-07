<?php
/**
 * Expense
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Expense'], function () {
        Route::resource('expenses', 'ExpensesController');
        //For Datatable
        Route::post('expenses/get', 'ExpensesTableController')->name('expenses.get');
    });
    
});
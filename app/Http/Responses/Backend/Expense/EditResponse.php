<?php

namespace App\Http\Responses\Backend\Expense;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Expense\Expense
     */
    protected $expenses;

    /**
     * @param App\Models\Expense\Expense $expenses
     */
    public function __construct($expenses)
    {
        $this->expenses = $expenses;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.expenses.edit')->with([
            'expenses' => $this->expenses
        ]);
    }
}
<?php

namespace App\Http\Responses\Backend\ExpenseCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ExpenseCategory\ExpenseCategory
     */
    protected $expensecategories;

    /**
     * @param App\Models\ExpenseCategory\ExpenseCategory $expensecategories
     */
    public function __construct($expensecategories)
    {
        $this->expensecategories = $expensecategories;
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
        return view('backend.expensecategories.edit')->with([
            'expensecategories' => $this->expensecategories
        ]);
    }
}
<?php

namespace App\Http\Controllers\Backend\Expense;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Expense\ExpenseRepository;
use App\Http\Requests\Backend\Expense\ManageExpenseRequest;

/**
 * Class ExpensesTableController.
 */
class ExpensesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExpenseRepository
     */
    protected $expense;

    /**
     * contructor to initialize repository object
     * @param ExpenseRepository $expense;
     */
    public function __construct(ExpenseRepository $expense)
    {
        $this->expense = $expense;
    }

    /**
     * This method return the data of the model
     * @param ManageExpenseRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageExpenseRequest $request)
    {
        return Datatables::of($this->expense->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($expense) {
                return Carbon::parse($expense->created_at)->toDateString();
            })
            ->addColumn('actions', function ($expense) {
                return $expense->action_buttons;
            })
            ->make(true);
    }
}

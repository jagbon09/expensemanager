<?php

namespace App\Http\Controllers\Backend\ExpenseCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ExpenseCategory\ExpenseCategoryRepository;
use App\Http\Requests\Backend\ExpenseCategory\ManageExpenseCategoryRequest;

/**
 * Class ExpenseCategoriesTableController.
 */
class ExpenseCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExpenseCategoryRepository
     */
    protected $expensecategory;

    /**
     * contructor to initialize repository object
     * @param ExpenseCategoryRepository $expensecategory;
     */
    public function __construct(ExpenseCategoryRepository $expensecategory)
    {
        $this->expensecategory = $expensecategory;
    }

    /**
     * This method return the data of the model
     * @param ManageExpenseCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageExpenseCategoryRequest $request)
    {
        return Datatables::of($this->expensecategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($expensecategory) {
                return Carbon::parse($expensecategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($expensecategory) {
                return $expensecategory->action_buttons;
            })
            ->make(true);
    }
}

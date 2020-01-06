<?php

namespace App\Http\Controllers\Backend\ExpenseCategory;

use App\Models\ExpenseCategory\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ExpenseCategory\CreateResponse;
use App\Http\Responses\Backend\ExpenseCategory\EditResponse;
use App\Repositories\Backend\ExpenseCategory\ExpenseCategoryRepository;
use App\Http\Requests\Backend\ExpenseCategory\ManageExpenseCategoryRequest;
use App\Http\Requests\Backend\ExpenseCategory\CreateExpenseCategoryRequest;
use App\Http\Requests\Backend\ExpenseCategory\StoreExpenseCategoryRequest;
use App\Http\Requests\Backend\ExpenseCategory\EditExpenseCategoryRequest;
use App\Http\Requests\Backend\ExpenseCategory\UpdateExpenseCategoryRequest;
use App\Http\Requests\Backend\ExpenseCategory\DeleteExpenseCategoryRequest;

/**
 * ExpenseCategoriesController
 */
class ExpenseCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExpenseCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ExpenseCategoryRepository $repository;
     */
    public function __construct(ExpenseCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ExpenseCategory\ManageExpenseCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageExpenseCategoryRequest $request)
    {
        return new ViewResponse('backend.expensecategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateExpenseCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ExpenseCategory\CreateResponse
     */
    public function create(CreateExpenseCategoryRequest $request)
    {
        return new CreateResponse('backend.expensecategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExpenseCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreExpenseCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.expensecategories.index'), ['flash_success' => trans('alerts.backend.expensecategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ExpenseCategory\ExpenseCategory  $expensecategory
     * @param  EditExpenseCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ExpenseCategory\EditResponse
     */
    public function edit(ExpenseCategory $expensecategory, EditExpenseCategoryRequest $request)
    {
        return new EditResponse($expensecategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExpenseCategoryRequestNamespace  $request
     * @param  App\Models\ExpenseCategory\ExpenseCategory  $expensecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expensecategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $expensecategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.expensecategories.index'), ['flash_success' => trans('alerts.backend.expensecategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteExpenseCategoryRequestNamespace  $request
     * @param  App\Models\ExpenseCategory\ExpenseCategory  $expensecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(ExpenseCategory $expensecategory, DeleteExpenseCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($expensecategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.expensecategories.index'), ['flash_success' => trans('alerts.backend.expensecategories.deleted')]);
    }
    
}

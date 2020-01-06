<?php

namespace App\Repositories\Backend\ExpenseCategory;

use DB;
use Carbon\Carbon;
use App\Models\ExpenseCategory\ExpenseCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpenseCategoryRepository.
 */
class ExpenseCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ExpenseCategory::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.expensecategories.table').'.id',
                config('module.expensecategories.table').'.created_at',
                config('module.expensecategories.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (ExpenseCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.expensecategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param ExpenseCategory $expensecategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(ExpenseCategory $expensecategory, array $input)
    {
    	if ($expensecategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.expensecategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param ExpenseCategory $expensecategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(ExpenseCategory $expensecategory)
    {
        if ($expensecategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.expensecategories.delete_error'));
    }
}

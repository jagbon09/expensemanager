<?php

namespace App\Repositories\Backend\Expense;

use DB;
use Carbon\Carbon;
use App\Models\Expense\Expense;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpenseRepository.
 */
class ExpenseRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Expense::class;

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
                config('module.expenses.table').'.id',
                config('module.expenses.table').'.name',
                config('module.expenses.table').'.amount',
                config('module.expenses.table').'.created_at',
                config('module.expenses.table').'.updated_at',
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
        $input['date'] = Carbon::parse($input['date'])->toDateTimeString();
        
        if (Expense::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.expenses.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Expense $expense
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Expense $expense, array $input)
    {
        $input['date'] = Carbon::parse($input['date'])->toDateTimeString();
        // dd($input);
        // die();
    	if ($expense->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.expenses.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Expense $expense
     * @throws GeneralException
     * @return bool
     */
    public function delete(Expense $expense)
    {
        if ($expense->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.expenses.delete_error'));
    }
}

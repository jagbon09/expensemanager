<?php

namespace App\Models\Expense\Traits;

/**
 * Class ExpenseAttribute.
 */
trait ExpenseAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-expense", "admin.expenses.edit").'
                '.$this->getDeleteButtonAttribute("delete-expense", "admin.expenses.destroy").'
                </div>';
    }
}

<?php

namespace App\Models\ExpenseCategory\Traits;

/**
 * Class ExpenseCategoryAttribute.
 */
trait ExpenseCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-expensecategory", "admin.expensecategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-expensecategory", "admin.expensecategories.destroy").'
                </div>';
    }
}

<?php

namespace App\Models\Category\Traits;

/**
 * Class CategoryAttribute.
 */
trait CategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-category", "admin.categories.edit").'
                '.$this->getDeleteButtonAttribute("delete-category", "admin.categories.destroy").'
                </div>';
    }
}

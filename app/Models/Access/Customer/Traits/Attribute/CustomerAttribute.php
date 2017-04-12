<?php

namespace App\Models\Access\Customer\Traits\Attribute;

/**
 * Class CustomerAttribute.
 */
trait CustomerAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.access.customer.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {    
        return '<a href="'.route('admin.access.customer.destroy', $this).'"
            data-method="delete"
            data-trans-button-cancel="'.trans('buttons.general.cancel').'"
            data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
            data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
            class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
        
    }

    public function getListServiceButtonAttribute() {
        return '<a href="'.route('admin.access.customer.service.list', $this).
                    '" class="btn btn-xs btn-primary">
                    <i class="fa fa-list" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="'.trans('buttons.general.crud.list').'">
                    </i>
                </a> ';
    }

    public  function getAddServiceButtonAttribute() {
        return '<a href="'.route('admin.access.customer.service.create', $this).
                    '" class="btn btn-xs btn-primary">
                    <i class="fa fa-plus" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="'.trans('buttons.general.crud.register').'">
                    </i>
                </a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute().
        $this->getDeleteButtonAttribute().
        $this->getListServiceButtonAttribute().
        $this->getAddServiceButtonAttribute();
    }
}

<?php

namespace App\Models\Access\Customer\Traits\Relationship;
use App\Models\Access\Customer\CustomerType;
use App\Models\Access\Customer\Service\CustomerService;
/**
 * Class CustomerRelationship.
 */
trait CustomerRelationship
{
    /**
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(CustomerType::class,'type_id');
    }

    public function services() {
        return $this->hasMany(CustomerService::class);
    }
}

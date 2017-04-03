<?php

namespace App\Models\Access\Customer\Traits\Relationship;
use App\Models\Access\Customer;
use App\Models\Access\Customer\Service;
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
        return $this->hasOne(CustomerType::class,'type_id');
    }

    public function service() {
        return $this->hasMany(CustomerService::class);
    }
}

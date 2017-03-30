<?php

namespace App\Models\Access\Customer\Traits\Relationship;
use App\Models\Access\Customer;
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
}

<?php

namespace App\Models\Access\Customer\Traits\Relationship;
use App\Models\Access\Customer\Service;
/**
 * Class CustomerRelationship.
 */
trait CustomerRelationship
{
    /**
     * @return mixed
     */
    public function service()
    {
        return $this->hasMany(CustomerService::class);
    }
}

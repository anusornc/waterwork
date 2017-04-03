<?php

namespace App\Models\Access\Customer\Traits\Relationship;
use App\Models\Access\Customer;
use App\Models\Access\Customer\Service;

/**
 * Class CustomerServiceRelationship.
 */
trait CustomerServiceRelationship
{
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}

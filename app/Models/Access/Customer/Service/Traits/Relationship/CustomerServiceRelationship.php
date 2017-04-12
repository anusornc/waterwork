<?php

namespace App\Models\Access\Customer\Service\Traits\Relationship;
use App\Models\Access\Customer\Customer;
use App\Models\Access\Customer\Service\ServiceStatus;


/**
 * Class CustomerServiceRelationship.
 */
trait CustomerServiceRelationship
{
    public function customers() {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function status() {
        return $this->belongsTo(ServiceStatus::class,'status_id');
    }
}

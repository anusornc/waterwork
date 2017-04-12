<?php

namespace App\Events\Backend\Access\Customer\Service;

use Illuminate\Queue\SerializesModels;

/**
 * Class CustomerServiceDeleted.
 */
class CustomerServiceDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $customer_services;

    /**
     * @param $customer_services
     */
    public function __construct($customer_services)
    {
        $this->customer_services = $customer_services;
    }
}

<?php

namespace App\Events\Backend\Access\Customer_services\Service;

use Illuminate\Queue\SerializesModels;

/**
 * Class CustomerServiceCreated.
 */
class CustomerServiceCreated
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

<?php

namespace App\Repositories\Backend\Access\Customer;

use App\Repositories\BaseRepository;
use App\Models\Access\Customer\Customer;

/**
 * Class CustomerRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Customer::class;

    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'customers.id',
                'customers.citizen_id',
                'customers.firstname',
                'customers.lastname',
            ]);
    }
}

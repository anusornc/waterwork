<?php

namespace App\Repositories\Backend\Access\Customer;

use App\Repositories\BaseRepository;
use App\Models\Access\Customer\CustomerType;

/**
 * Class CustomerTypeRepository.
 */
class CustomerTypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = CustomerType::class;
}

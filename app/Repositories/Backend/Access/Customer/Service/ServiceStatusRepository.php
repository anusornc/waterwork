<?php

namespace App\Repositories\Backend\Access\Customer\Service;

use App\Repositories\BaseRepository;
use App\Models\Access\Customer\Service\ServiceStatus;

/**
 * Class StatusRepository.
 */
class ServiceStatusRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ServiceStatus::class;
}

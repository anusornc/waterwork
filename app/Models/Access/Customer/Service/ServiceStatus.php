<?php

namespace App\Models\Access\Customer\Service;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Customer\Service\CustomerService;
/**
 * ClasServices Status.
 */
class ServiceStatus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_status';

    public function services() {
        return $this->hasMany(CustomerService::class,'status_id');
    }
}

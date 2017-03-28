<?php

namespace App\Models\Access\Customer\Service;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Customer\Service\Traits\Attribute\CustomerAttribute;

class CustomerService extends Model
{
    use CustomerServiceAttribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'customer_services';
    }

}

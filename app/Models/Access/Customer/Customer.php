<?php

namespace App\Models\Access\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Customer\Traits\Attribute\CustomerAttribute;

class Customer extends Model
{
    use CustomerAttribute;
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
    protected $fillable = ['user_id', 'citizen_id', 'firstname','lastname','occupation','workplace','address'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'customers';
    }

}

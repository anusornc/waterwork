<?php

namespace App\Models\Access\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Customer\Traits\Attribute\CustomerAttribute;
use App\Models\Access\Customer\Traits\Relationship\CustomerRelationship;

class Customer extends Model
{
    use CustomerAttribute,CustomerRelationship;
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
    protected $fillable = ['citizen_id','type_id','title','firstname','lastname','birthdate','house_id','tambon','aumphur','province','occupation','email','workplace'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'customers';
    }

}

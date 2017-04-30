<?php

namespace App\Models\Access\SystemVar;

use Illuminate\Database\Eloquent\Model;

class Sys extends Model
{
    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'sys';
    }

}
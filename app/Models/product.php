<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'total' => 'float',
    ];
}
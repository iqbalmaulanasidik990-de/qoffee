<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [

        'queue_number',

        'customer_name',

        'phone',

        'total_people',

        'latte',

        'americano',

        'cappuccino',

        'total_price',

        'status',

    ];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [

        'created_at',
        'updated_at'
    ];

    protected $dates = ['uploaded_date'];
}

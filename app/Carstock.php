<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carstock extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'deleted_at',
    ];
}

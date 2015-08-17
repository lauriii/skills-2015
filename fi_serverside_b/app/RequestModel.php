<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'organization', 'phone', 'email', 'country'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'requests';

}

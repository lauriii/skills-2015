<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Referenced seatings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seatings() {
        return $this->hasMany('App\Seating');
    }

    /**
     * Referenced tables.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tables() {
        return $this->hasMany('App\Table');
    }

}

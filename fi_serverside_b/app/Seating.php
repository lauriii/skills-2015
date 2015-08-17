<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['time'];

    /**
     * Module seating belogns to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module() {
        return $this->belongsTo('App\Module');
    }

    public function availableSeats() {
        return $this->belongsTo('App\Module')->seatings;
    }

}

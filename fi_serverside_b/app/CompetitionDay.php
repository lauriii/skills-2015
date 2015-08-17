<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionDay extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'date'];

    /**
     * Gets reservations for the specific day for specific seating.
     *
     * @param $seating
     */
    public function reservationsForSeating($seating) {
        $this->hasMany('App/Request');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'organization', 'country', 'status'];

    /**
     * Gets the date guest belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competitionDay() {
        return $this->belongsTo('App\CompetitionDay');
    }

    /**
     * Gets the seating guest belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seating() {
        return $this->belongsTo('App\Seating');
    }

    /**
     * Gets the seating guest belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function request() {
        return $this->belongsTo('App\RequestModel');
    }


}

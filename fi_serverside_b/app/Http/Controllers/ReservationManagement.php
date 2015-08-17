<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GuestModel;
use App\Http\Controllers\Controller;

class ReservationManagement extends Controller
{
    /**
     * Builds the admin interface for the system.
     *
     * @return Response
     */
    public function build()
    {
        return view('admin.reservations', ['requests' => GuestModel::all()]);
    }

}

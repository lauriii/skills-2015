<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Seating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class Reservation extends Controller
{
    /**
     * Builds basic information form.
     *
     * @return Response
     */
    public function buildInformationForm()
    {
        return view('reservation.information');
    }

    /**
     * Handles a post type of requests for information form.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function postInformationForm(Request $request) {
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'organization' => 'required|max:255',
                'email' => 'required|email|max:255',
                'country' => 'required',
                'agree' => 'required',
            ]
        );

        if ($request->get('submit') == 'individual') {
            return RedirectResponse::create(url('reservation/individual'));
        }

        return RedirectResponse::create(url('reservation/group'));
    }

    /**
     * Builds reservation form for individual.
     *
     * @return Response
     */
    public function buildIndividualForm() {
        $seating_array = [];

        foreach (Seating::all() as $seating) {
            $value = [];
            $value['start_time'] = $seating->start_time;
            $value['end_time'] = $seating->end_time;
            $value['name'] = $seating->module->name;
            $tables = $seating->module->tables;
            $seats = 0;
            foreach ($tables as $table) {
                $seats = $seats + $table->amount;
            }
            $value['seats'] = $seats;
        }
        return view('reservation.individual');
    }

    /**
     * Builds reservation form for groups.
     *
     * @return Response
     */
    public function buildGroupForm() {
        return view('reservation.group');
    }

}

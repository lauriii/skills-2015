<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Module;

class Welcome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function build()
    {
        $result = Module::all();
        $modules = [];
        foreach ($result as $key => $module) {
            $modules[$key] = $module->toArray();
            $modules[$key]['seatings'] = $module->seatings;
            foreach ($module->tables as $table) {
                $modules[$key]['seating_options'][$table->amount] = $table->amount;
            }
        }

        return view('welcome', ['modules' => $modules]);
    }

}

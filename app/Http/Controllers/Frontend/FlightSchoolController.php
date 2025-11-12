<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;

class FlightSchoolController extends Controller
{
    public function index()
    {
        return view('pages.flightschool');
    }

    public function program()
    {
        return view('pages.flightschool_program');
    }
}

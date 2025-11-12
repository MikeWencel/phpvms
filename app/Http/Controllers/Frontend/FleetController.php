<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;

class FleetController extends Controller
{
    public function index()
    {
        return view('pages.fleet');
    }
}

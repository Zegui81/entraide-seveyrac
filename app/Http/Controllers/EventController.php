<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    public function getAccueilEvent() {
        return view('event');
    }
}

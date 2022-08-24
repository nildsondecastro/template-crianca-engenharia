<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eventos = Event::where('active', true)->get();
        return view('home', compact('eventos'));
    }

}

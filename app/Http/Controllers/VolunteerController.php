<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registerVolunteer($id)
    {
        $evento = Event::where([
            ['active', true],['id_events', $id]])->first();

        if(!$evento)
            return redirect()->back()->with('error', 'Não Encontrado');

        $voluntario = Volunteer::where([
            ['id_users', Auth::user()->id],
            ['id_events', $id]
        ])->first();
            
        return view('volunteer.show', compact('evento', 'voluntario'));
    }

}

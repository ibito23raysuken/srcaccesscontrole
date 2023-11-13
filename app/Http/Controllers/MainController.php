<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Presence;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function home() {
        return view('welcome');
    }
    function schedule() {
        $matieres=Matiere::all();
        return view('schedule.index',[
            'matieres'=>$matieres]);
    }
    function presence() {
        $presence=Presence::paginate('20');
        return view('presence.index',[
            'presences'=>$presence]);
    }
}

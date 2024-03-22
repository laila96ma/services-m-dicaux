<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RDV;
use App\Models\patient;
use Illuminate\Http\Request;

class SalleAttenteController extends Controller
{
    public function index()
    {
       
        $aujourdHui = Carbon::today();
    
        $RDV = RDV::with('patient')->whereDate('date_RDV', $aujourdHui) ->orderBy('date_RDV', 'asc')->get();
        return view('layouts.salleAttente', compact('RDV'));
    }
    public function deleteRDV($id)
{
    
    $RDV = RDV::findOrFail($id);
    $RDV->delete();
    return redirect()->back()->with('success', 'Rendez-vous supprimé avec succès.');
}

}

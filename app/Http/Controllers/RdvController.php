<?php

namespace App\Http\Controllers;

use App\Models\RDV;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PDF;
class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $RDV=  RDV::all();
        return view ('layouts.RDV')->with('RDV',$RDV);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = patient::all();
        return view('layouts.createRDV', compact('patients'));
       
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
         
        $request->validate([
            'num' => 'required',
            'date_RDV' => 'required',
            'type_RDV'  => 'required',
        
        ]);
    
        $input = $request->all();

       
        if (!isset($input['patientID'])) {
            return redirect()->route('RDV.create')->with('error', 'Sélectionnez un patient.');
        }

       
        RDV::create([
            'num' => $input['num'],
            'date_RDV' => $input['date_RDV'],
            'type_RDV' => $input['type_RDV'],
            'patientID' => $input['patientID']
        ]);

        return redirect()->route('RDV.index')->with('flash_message', 'rendez-vous ajoutée avec succès!');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    
       $RDV=  RDV::findOrFail($id);
        $patient =$RDV->patient;

        return view('layouts.showRDV', compact('RDV', 'patient'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RDV = RDV::find($id);
        $patients = patient::all(); 
    
        return view('layouts.editRDV', compact('RDV', 'patients'));
    }
       
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $RDV =  RDV::find($id);

        $input = $request->all();
    
        
        if (!isset($input['patientID'])) {
            return redirect()->route('RDV.edit', $id)->with('error', 'Sélectionnez un patient.');
        }
    
        
       $RDV->update([
            'num' => $input['num'],
            'date_RDV' => $input['date_RDV'],
            'type_RDV' => $input['type_RDV'],
            'patientID' => $input['patientID']
        ]);
    
        return redirect()->route('RDV.index')->with('flash_message', 'rendez-vous mise à jour avec succès!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RDV::destroy($id);

        return redirect()->route('RDV.index')->with('flash_message', ' rendez-vous supprimée avec succès!');
    }
    function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $matricule = $request->get('matricule');
            $RDV  = patient::join('rendez-vous', 'rendez-vous.patientID', '=', 'patient.id')
            ->select('patient.matricule', 'patient.nom', 'patient.poste', 'patient.service',  'rendez-vous.num', 'rendez-vous.date_RDV', 'rendez-vous.type_RDV')
            ->where('matricule', 'like', '%' . $matricule . '%')
            ->get();
            return view('layouts.searchRDV', compact('RDV'));

        }
    return view('layouts.searchRDV',compact('RDV'));
}

public function download(RDV $id)
{
    $RDV = RDV::with('patient')->find($id->id);

    if (!$RDV) {
        return redirect()->back()->with('error', 'Rendez-vous non trouvé.');
    }

    $pdf = PDF::loadView('pdf.RDV', compact('RDV'));
    return $pdf->download('RDV.pdf');
}

}



<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients= patient::all();
        return view ('layouts.patient')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = patient::all();
        return view('layouts.create', compact('patients'));
       
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
             'matricule' => 'required',
             'nom' => 'required',
             'date_naissance' => 'required',
             'cin' => 'required',
             'poste' => 'required',
             'service' => 'required',
             'motif' => 'required',
         ]);
     
         $input = $request->all();
     
         patient::create([
             'matricule' => $input['matricule'],
             'nom' => $input['nom'],
             'date_naissance' => $input['date_naissance'],
             'cin' => $input['cin'], 
             'poste' => $input['poste'], 
             'service' => $input['service'], 
             'motif' => $input['motif']
         ]);
     
         return redirect()->route('patient.index')->with('flash_message', 'Patient ajouté avec succès!');
     }
     



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $patients = patient::find($id);
        return view('layouts.show')->with('patients', $patients);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients = patient::find($id);
        return view('layouts.edit')->with('patients', $patients);
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
        $patients = patient::find($id);
        $input = $request->all();
        $patients->update($input);
        return redirect('patient')->with('flash_message', 'patient Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        patient::destroy($id);
        return redirect('patient')->with('flash_message', 'patient deleted!');  
    }
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $matricule = $request->get('matricule');
            $patients = Patient::select('matricule', 'nom', 'date_naissance', 'cin', 'poste', 'service', 'motif')
                ->where('matricule', 'like', '%' . $matricule . '%')
                ->get();
            return view('layouts.patient', compact('patients'));
        }
    
        return view('layouts.patient');
    }
    
}


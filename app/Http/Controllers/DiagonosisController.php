<?php

namespace App\Http\Controllers;

use App\Models\Diagonosis;
use App\Models\Animal;
use Illuminate\Http\Request;

class DiagonosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        
        return view('dashboard.add-diagonosis', [
            'animal_type' => '',
            'breed' => '',
            'color_markings' => '',
            'owner_info' => '',
        ]);
    }
     
    public function search(Request $request)
    {
        $animalCode = $request->get('animalCode');

        $animal = Animal::where('animal_code', $animalCode)->first();

        if ($animal) {
            return response()->json($animal);
        }

        return response()->json(['error' => 'Animal not found'], 404);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diagnoses = Diagonosis::all();
        return view('dashboard.diagnosis-results', compact('diagnoses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new instance of the Diagnosis model
        $diagnosis = new Diagonosis();

        // Assign values from the request to the model attributes
        $diagnosis->animal_code = $request->input('animal_code');
        $diagnosis->medical_history = $request->input('medical_history');
        $diagnosis->physical_exam_findings = $request->input('physical_exam_findings');
        $diagnosis->diagnostic_tests = $request->input('diagnostic_tests');
        $diagnosis->other_diagnostic_procedures = $request->input('other_diagnostic_procedures');
        $diagnosis->assessment_diagnosis = $request->input('assessment_diagnosis');

        // Save the diagnosis record
        if ($diagnosis->save()) {
            // Diagnosis saved successfully
            return redirect()->back()->with('success', 'Diagnosis created successfully!');
        } else {
            // Failed to save Diagnosis
            return redirect()->back()->with('error', 'Failed to create Diagnosis!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagonosis  $diagonosis
     * @return \Illuminate\Http\Response
     */
    public function show(Diagonosis $diagonosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagonosis  $diagonosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagonosis $diagonosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagonosis  $diagonosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagonosis $diagonosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagonosis  $diagonosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagonosis $diagonosis)
    {
        //
    }
}

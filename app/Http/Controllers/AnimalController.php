<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.animal-registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals = Animal::all(); 
        return view('dashboard.all-animals', compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Create a new animal instance
         $animal = new Animal();
        
         $animal->animal_type = $request->input('animal_type');
         $animal->breed = $request->input('breed');
         $animal->age = $request->input('age');
         $animal->spayed = $request->input('spayed');
         $animal->gender = $request->input('gender');
         $animal->color_markings = $request->input('color_markings');
         $animal->emergency_contact = $request->input('emergency_contact');
         $animal->weight = $request->input('weight');
         $animal->animal_code = $request->input('animal_code');
         $animal->vaccination_history = $request->input('vaccination_history');
         $animal->medical_history = $request->input('medical_history');
         $animal->owner_info = $request->input('owner_info');
 
         // Save the animal
        if ($animal->save()) {
            // Animal saved successfully
            return redirect()->back()->with('success', 'Animal created successfully!');
        } else {
            // Failed to save Animal
            return redirect()->back()->with('error', 'Failed to create Animal!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        // Update the animal data with the data submitted from the form
        $animal->animal_type = $request->input('animal_type');
        $animal->breed = $request->input('breed');
        $animal->age = $request->input('age');
        $animal->spayed = $request->input('spayed');
        $animal->gender = $request->input('gender');
        $animal->color_markings = $request->input('color_markings');
        $animal->emergency_contact = $request->input('emergency_contact');
        $animal->weight = $request->input('weight');
        $animal->microchip_tag = $request->input('microchip_tag');
        $animal->vaccination_history = $request->input('vaccination_history');
        $animal->medical_history = $request->input('medical_history');
        $animal->owner_info = $request->input('owner_info');

        // Save the updated animal data to the database
        if ($animal->save()) {
            return redirect()->back()->with('success', 'Animal details updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Updating animal failed!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $animal = Animal::findOrFail($id);
    //     $animal->delete();

    //     return redirect()->back()->with('success', 'Animal deleted successfully!');
    // }
}

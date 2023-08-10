<?php

namespace App\Http\Controllers;

use App\Models\Drugprescription;
use App\Models\Medicine;
use Illuminate\Http\Request;

class DrugprescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('dashboard.drug-prescription', compact('medicines'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $animal_code = $request->get('animal_code');
        $prescriptions=Drugprescription::where('animal_code', $animal_code)->get();
        $totalAmount = 0; // Initialize the total amount variable

        // Calculate the total amount and subtotal
        foreach ($prescriptions as $prescription) {
            // Assuming there is a 'price' column in the 'Drugprescription' model
            $totalAmount += $prescription->price * $prescription->quantity;
        }

        $subtotal = $totalAmount; // Set the subtotal to the same value as total amount initially
    
        return view('dashboard.prescription-summary', compact('prescriptions', 'totalAmount', 'subtotal'));
    }

    public function getMedicinePrice(Request $request)
    {
        $medicine_name = $request->get('medicine');

        $medicine = Medicine::where('medicine_name', $medicine_name)->first();

        if ($medicine) {
            return response()->json($medicine);
        }

        return response()->json(['error' => ' 0.0'], 404);
    }

    public function getPrescriptions(Request $request)
    {
        $animalCode = $request->get('animal_code');
        $prescriptions = Drugprescription::where('animal_code', $animalCode)->get();
    
        if ($prescriptions->isEmpty()) {
            return response()->json(['error' => 'No prescriptions found']);
        }
    
        $subtotal = 0;
        $totalAmount = 0;
    
        foreach ($prescriptions as $prescription) {
            $subtotal += $prescription->price * $prescription->quantity;
            $totalAmount += $prescription->price * $prescription->quantity;
        }
    
        return response()->json([
            'prescriptions' => $prescriptions,
            'subtotal' => $subtotal,
            'totalAmount' => $totalAmount
        ]);
    }
    







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new instance of the DrugPrescription model
        $prescription = new Drugprescription();

        // Set the values from the form inputs
        $prescription->animal_code = $request->input('animal_code');
        $prescription->medicine = $request->input('medicine');
        $prescription->dosage = $request->input('dosage');
        $prescription->frequency = $request->input('frequency');
        $prescription->duration = $request->input('duration');
        $prescription->quantity = $request->input('quantity');
        $prescription->price = $request->input('price');
        $prescription->instructions = $request->input('instructions');
      
        // Optionally, you can redirect the user to a success page or perform any other desired action
        if ($prescription->save()) {
            return redirect()->back()->with('success', 'Prescription submitted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to submit the prescription.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drugprescription  $drugprescription
     * @return \Illuminate\Http\Response
     */
    public function show(Drugprescription $drugprescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drugprescription  $drugprescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Drugprescription $drugprescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drugprescription  $drugprescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drugprescription $drugprescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drugprescription  $drugprescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drugprescription $drugprescription)
    {
        //
    }
}

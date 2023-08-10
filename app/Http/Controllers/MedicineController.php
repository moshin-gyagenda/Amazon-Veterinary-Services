<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.add-medicines');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines=Medicine::all();
        return view('dashboard.view-stock', compact('medicines'));
    }

    public function inventory()
    {
        $medicines=Medicine::all();
        return view('dashboard.invetory-tracking', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $medicine = new Medicine();

            $medicine->medicine_name = $request->input('medicine_name');
            $medicine->category = $request->input('category');
            $medicine->manufacturer = $request->input('manufacturer');
            $medicine->batch_number = $request->input('batch_number');
            $medicine->expiration_date = $request->input('expiration_date');
            $medicine->quantity = $request->input('quantity');
            $medicine->unit_of_measurement = $request->input('unit_of_measurement');
            $medicine->purchase_date = $request->input('purchase_date');
            $medicine->supplier = $request->input('supplier');
            $medicine->purchase_price = $request->input('purchase_price');
            $medicine->selling_price = $request->input('selling_price');
            $medicine->notes = $request->input('notes');

            if ($medicine->save()) {
                return redirect()->back()->with('success', 'Medicine record added successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to create Medicine record');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Veterinaryshop;
use App\Models\Medicine;
use Illuminate\Http\Request;

class VeterinaryshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('dashboard.veterinary-shop', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $billingData=Veterinaryshop::all();
        return view('dashboard.billing-payment',compact('billingData'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new Veterinaryshop instance and assign the request data
        $prescription = new Veterinaryshop();
        $prescription->customer_name = $request->input('customer_name');
        $prescription->medicine = $request->input('medicine');
        $prescription->dosage = $request->input('dosage');
        $prescription->frequency = $request->input('frequency');
        $prescription->duration = $request->input('duration');
        $prescription->quantity = $request->input('quantity');
        $prescription->price = $request->input('price');
        $prescription->instructions = $request->input('instructions');
        $prescription->status ='Not Paid';

        if ($prescription->save()) {
            return redirect()->back()->with('success', 'Prescription submitted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to submit prescription');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veterinaryshop  $veterinaryshop
     * @return \Illuminate\Http\Response
     */
    public function show($customerName)
    {
        // Retrieve the billing data based on the customer name
        $billingData = Veterinaryshop::where('customer_name', $customerName)->get();
        
        return view('dashboard.payment', ['billingData' => $billingData]);
    }



    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veterinaryshop  $veterinaryshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Veterinaryshop $veterinaryshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Veterinaryshop  $veterinaryshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veterinaryshop $veterinaryshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veterinaryshop  $veterinaryshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veterinaryshop $veterinaryshop)
    {
        //
    }
}

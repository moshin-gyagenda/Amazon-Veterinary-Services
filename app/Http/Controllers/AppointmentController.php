<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.add-appointment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointments=Appointment::orderBy('created_at', 'desc')->get();
        return view('dashboard.view-appointment', compact('appointments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->first_name = $request->input('first_name');
        $appointment->last_name = $request->input('last_name');
        $appointment->email = $request->input('email');
        $appointment->address = $request->input('address');  
        $appointment->phone_number = $request->input('phone_number');
        $appointment->services = $request->input('services');
        $appointment->species = $request->input('species');
        $appointment->breed = $request->input('breed');
        $appointment->preferred_date = $request->input('preferred_date');
        $appointment->preferred_time = $request->input('preferred_time');
        $appointment->reason = $request->input('reason');
        $appointment->status = "New Appointment";
            //save appointment information
        if ($appointment->save()) {
            // Appointment saved successfully
            return redirect()->back()->with('success', 'Appointment created successfully!');
        } else {
            // Failed to save Appointment
            return redirect()->back()->with('error', 'Failed to create Appointment!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $status = $request->input('status');
        $appointmentId = $request->input('appointmentId');
        
        // Retrieve the appointment from the database
        $appointment = Appointment::find($appointmentId);
        
        if ($appointment) {
            // Update the appointment status
            $appointment->status = $status;
            $appointment->save();
            
            // Return a success response if needed
            return redirect()->back()->with('success' , 'Appointment status updated successfully');
        } else {
            // Return an error response if the appointment is not found
            return redirect()->back()->with('error' , 'Appointment not found');
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Auth;
class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role =!2){
            return redirect('/');
        }
    
        return view('appointments.appointments', [
            'appointments' => Appointment::orderBy('appointment_date' , 'desc')->get(),
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
        // Check Validation
        $this->validateAppointment($request);

        // Create new Appointment
        Appointment::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        
        return view('appointments.edit', [
            'appointment' => $appointment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Appointment  $appointment)
    {
        //Check Validation
        $this->validateAppointment($request);

        // Update Appointment
        $appointment->update([
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
        ]);
        return redirect('/appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back();
    }

    private function validateAppointment(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required',
        ]);
    }
}

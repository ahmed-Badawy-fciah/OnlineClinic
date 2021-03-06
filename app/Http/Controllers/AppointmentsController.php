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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->role =!2){
            return redirect('/');
        }
        $this->checkExpired();
        return view('appointments.appointments', [
            'appointments' => Appointment::orderBy('appointment_date' , 'asc')->get(),
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
        auth()->user()->appointments()->create($request->all());
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
            'appointment_time' => 'required|date_format:H:i',
        ]);
    }

    private function checkExpired(){
        Appointment::where('appointment_date', \Carbon\Carbon::today())
        ->update(['status' => 2]);
    }

    //Let Patient or repular user to use appointment
    // You will use this function in others pages.
    public function choseAppointment(Appointment $appointment)
    {
        
        //check if the user is not the owner and the appointment is already avalibale
        if(!$appointment->own() && $appointment->status != 1 && $appointment->status != 2)
        {
            $appointment->status = 1 ;
            $appointment->patient_id = auth()->id();
            $appointment->save();
            return 'Done';
        }
        return 'You Cant choose this appointment';
    }

    // Some important notes
    /*
        In this code I used 0, 1 & 2 in the appointment status
        as 0 = to free (no one chosoe the appointment yet or the appointment had just created)
        1 = someone has booked the appointment
        2 = the appointment date is expired (appointment date is equal to today)
        .
        .
        .
        Docor (the User ) can't create appointment has the date of today
    */
}

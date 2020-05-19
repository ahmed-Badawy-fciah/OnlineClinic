<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Appointment extends Model
{
    protected $guarded = ['id'];
    
    protected static function boot(){
        parent::boot();
        static::creating(function($appointment){
            $appointment->status = 0;
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Check the user is own the appointment
    public function own()
    {
        return auth()->user()->id == $this->user_id ;
    }

    // get the patient who had chose this appointment
    public function getPatient()
    {
        return User::where('id' , $this->patient_id)->first();
    }
}

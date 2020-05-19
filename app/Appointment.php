<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}

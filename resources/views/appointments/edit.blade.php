@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">  
    <div class="col-md-10 col-md-offset-1">  
         <div class="panel panel-default">  
                  
              <div class="panel-body">
               <h3 class="text-center">Welcome doctor {{auth()->user()->name}}</h3>
                  {{ Form::open(['action' => ['AppointmentsController@update' , $appointment->id], 'method' => 'POST']) }}
                    <div class="form-group">
                      {{Form::label('appointment_date' , 'Appointment')}}
                      {{Form::date('appointment_date' , \Carbon\Carbon::createFromDate($appointment->appointment_date)  ,['class' => 'form-control' ,])}}
                      @error('appointment_date')
                        <p class="text-danger text-small">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                      {{Form::label('appointment_time' , 'Time')}}
                      {{Form::time('appointment_time', \Carbon\Carbon::createFromDate($appointment->appointment_time) , ['class' => 'form-control'])}}
                      @error('appointment_time')
                        <p class="text-danger text-small">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{Form::hidden('_method' , 'PATCH')}}
                    </div>
                    <div class="form-group">
                      {{ Form::submit('update', ['class' => 'btn btn-primary']) }}
                      <a href="/appointments"class="btn btn-warning pull-right">Back</a>
                    </div>
                  {{ Form::close() }}
                <hr>
               
              </div>
            </div>
        </div>    
    </div>
</div>
@endsection
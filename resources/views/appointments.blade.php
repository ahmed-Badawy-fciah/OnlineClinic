@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">  
    <div class="col-md-10 col-md-offset-1">  
         <div class="panel panel-default">  
                  
              <div class="panel-body">
               <h3 class="text-center">Welcome doctor {{auth()->user()->name}}</h3>
                  {{ Form::open(['action' => 'AppointmentsController@store' , 'method' => 'POST']) }}
                    <div class="form-group">
                      {{Form::label('appointment_date' , 'Appointment')}}
                      {{Form::date('appointment_date' , \Carbon\Carbon::now()  ,['class' => 'form-control' ,])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('appointment_time' , 'Time')}}
                      {{Form::time('appointment_time', \Carbon\Carbon::now()->format('H:i')) , ['class' => 'form-control']}}
                    </div>
                    <div class="form-group">
                      {{Form::label('status' , 'status')}}
                      {{Form::number('status' , '' , ['class' => 'form-control' , 'placeholder' => 'Status'])}}
                    </div>
                    <div class="form-group">
                      {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                    </div>
                  {{ Form::close() }}
                <hr>
               <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Appointment Time</th>
                      <th scope="col">Status</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($appointments as $appointment)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{$appointment->appointment_date}}</td>
                      <td>{{$appointment->appointment_time}}</td>
                      <td>{{$appointment->status}}</td>
                      <td>
                        {{Form::open(['action' => ['AppointmentsController@destroy' , $appointment->id] , 'method' =>'DELETE'])}}
                            {{Form::submit('Delete' , ['class' => 'btn btn-danger btn-xs'])}}
                        {{Form::close()}}
                      </td>
                    </tr>
                  @empty
                    <tr>
                      You don't have any appointments
                    </tr>
                  @endforelse
                  </tbody>
                </table>
              </div>
            </div>
        </div>    
    </div>
</div>
@endsection
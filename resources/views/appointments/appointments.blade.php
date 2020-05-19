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
                      @error('appointment_date')
                        <p class="text-danger text-small">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                      {{Form::label('appointment_time' , 'Time')}}
                      {{Form::time('appointment_time', \Carbon\Carbon::now()->format('H:i') , ['class' => 'form-control'])}}
                      @error('appointment_time')
                        <p class="text-danger text-small">{{$message}}</p>
                      @enderror
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
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Appointment Time</th>
                      <th scope="col">Status</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($appointments as $appointment)
                    <tr>
                      <td>{{$appointment->appointment_date}}</td>
                      <td>{{$appointment->appointment_time}}</td>
                      @if($appointment->status == 1)
                      <td class="text-info"><b>Free</b></td>
                      @else
                      <td class="text-success"><b>Booked</b></td>
                      @endif
                      <td>
                        {{Form::open(['action' => ['AppointmentsController@destroy' , $appointment->id] , 'method' =>'DELETE'])}}
                            {{Form::submit('Delete' , ['class' => 'btn btn-danger btn-xs'])}}
                        {{Form::close()}}
                      </td>
                      <td><a href="/appointments/{{$appointment->id}}" class="btn-primary btn-xs">Edit</a></td>
                    </tr>
                  @empty
                  <h3 class="text-center text-danger">You Don't Have any Appointment Yet!</h3>
                  @endforelse
                  </tbody>
                </table>
              </div>
            </div>
        </div>    
    </div>
</div>
@endsection
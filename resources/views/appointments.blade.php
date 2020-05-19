@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">  
    <div class="col-md-10 col-md-offset-1">  
         <div class="panel panel-default">  
                  
              <div class="panel-body">
               <h3 class="text-center">Welcome doctor {{auth()->user()->name}}</h3>
                  {{ Form::open(['url' => 'foo/bar']) }}
                    <div class="form-group">
                      {{Form::label('title' , 'Title')}}
                      {{Form::text('title' , '' , ['class' => 'form-control' , 'placeholder' => 'this is title'])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('appointment_date' , 'Appointment')}}
                      {{Form::date('appointment_date' , \Carbon\Carbon::now()  ,['class' => 'form-control' ,])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('appointment_time' , 'Time')}}
                      {{Form::time('appointment_time', \Carbon\Carbon::now()->format('H:i')) , ['class' => 'form-control']}}
                    </div>
                      
                  {{ Form::close() }}
                <hr>
               <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>    
    </div>
</div>
@endsection
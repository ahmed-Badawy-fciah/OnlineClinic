@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">  
    <div class="col-md-10 col-md-offset-1">  
         <div class="panel panel-default">  
           <div class="panel-headind">Appointments</div>
                  
              <div class="panel-body">
               Welcom doctor
                    
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
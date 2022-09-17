@extends('dashboard')

@section('content')
  <div class="container">
         <div class="row ml-5">

         
            <div class="custloyee">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif
            <h4>All setting</h4>
            <a class="btn btn-info btn-sm float-right mb-2">All setting</a>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Address</th>
                     <th>City</th>
                     <th>Action</th>
                     
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $setting as $key => $set )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $set->company_name}}</td>
                     <td>{{ $set->email}}</td>
                     <td>{{ $set->phone}}</td>
                     <td>{{ $set->address}}</td>
                     <td>{{ $set->city}}</td>
                     <td><a class="btn btn-info" href="{{ url('setting/view-setting/'.$set->id )}}"><i class="fa fa-eye"></i></a></td>
                     <td><a class="btn btn-success" href="{{ url('setting/edit-setting/'.$set->id )}}"><i class="fa fa-pen"></i></a></td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
            </div>
         </div>

         
  </div>
@endsection
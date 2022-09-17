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
            <h4>All Customer</h4>
            <a class="btn btn-info btn-sm float-right mb-2">All Customer</a>
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
                  @foreach( $customers as $key => $cust )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $cust->name}}</td>
                     <td>{{ $cust->email}}</td>
                     <td>{{ $cust->phone}}</td>
                     <td>{{ $cust->address}}</td>
                     <td>{{ $cust->city}}</td>
                     <td><a class="btn btn-info" href="{{ url('customer/view-customer/'.$cust->id )}}"><i class="fa fa-eye"></i></a></td>
                     <td><a class="btn btn-success" href="{{ url('customer/edit-customer/'.$cust->id )}}"><i class="fa fa-pen"></i></a></td>
                     <td><a class="btn btn-danger"  href="{{ url('customer/delete/'.$cust->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a></td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
            </div>
         </div>

         
  </div>
@endsection
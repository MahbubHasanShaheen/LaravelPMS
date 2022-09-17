@extends('dashboard')

@section('content')
  <div class="container">
         <div class="row ml-5">

         
            <div class="employee">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif
            <a class="text-success float-left mb-2 mt-2">All Employee</a>
            <a href="{{route('add.employee')}}" class="btn btn-info btn-sm float-right mb-2 mt-2">Add New</a>
               <table class="table table-striped">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Image</th>
                     <th>Action</th>
                     
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $employees as $key => $emp )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $emp->name}}</td>
                     <td>{{ $emp->email}}</td>
                     <td>{{ $emp->phone}}</td>
                     <td><img src="{{asset($emp->photo)}}" height="60" alt=""></td>
                     <td><a class="btn btn-info" href="{{ url('employee/view-employee/'.$emp->id )}}"><i class="fa fa-eye"></i></a>
                     <a class="btn btn-success" href="{{ url('employee/edit-employee/'.$emp->id )}}"><i class="fa fa-pen"></i></a>
                     <a class="btn btn-danger"  href="{{ url('employee/delete/'.$emp->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a></td>
                   </tr>
                  
                   @endforeach
                 </tbody>
               </table>
               <hr>

            </div>
         </div>

         <script>
function remove(el) {
  var element = el;
  element.remove();
}
         </script>
         
  </div>
@endsection
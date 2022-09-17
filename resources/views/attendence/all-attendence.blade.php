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
            <a>All attendence</a>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Date</th>
                     <th>Month</th>
                     <th>Action</th>
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $all_att as $key => $row )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $row->edit_date}}</td>
                      <td>{{ $row->month}}</td>
                     <td>
                    <a class="btn btn-success" href="{{ url('attendence/edit-attendence/'.$row->edit_date )}}"><i class="fa fa-pen"></i></a>
                    <a class="btn btn-info" href="{{ URL::to('attendence/view-attendence/'.$row->edit_date )}}"><i class="fa fa-eye"></i></a>
                    
                    <a class="btn btn-danger"  href="{{ url('attendence/delete/'.$row->id )}}" onclick="return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
                   </td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
            </div>
         </div>

         
  </div>
@endsection
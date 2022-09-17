@extends('dashboard')

@section('content')
  <div class="container">
         <div class="emp ml-5">

         
            <div class="employee">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif

    @if(session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif

            <a class="text-success mb-2 mt-2">Take attendence</a>
            <a>{{ date("d/m/y") }}</a>
            <a href="" class="btn btn-info btn-sm float-right mb-2 mt-2">Add New</a>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Name</th>
                     <th>Photo</th>
                     <th>attendence</th>
                     
                   </tr>
                 </thead>

                 <tbody>
                    <form action="{{url('attendence/insert-attendence')}}" method="post">
                    @csrf
                  @foreach( $employees as $key => $row )
                 
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $row->name}}</td>
                     <td><img src="{{asset($row->photo)}}" height="60" alt=""></td>
                     <input type="hidden" name="emp_id[]" value="{{$row->id}}">
                     <td>
                        <input  type="radio" name="attendence[{{ $row->id }}]" value="Present">Prensent
                        <input  type="radio" name="attendence[{{ $row->id }}]" value="Leave">Leave
                        <input  type="radio" name="attendence[{{ $row->id }}]" value="Absense">Absense
                    </td>
                      <input type="hidden" name="att_date" value="{{ date('d/m/y')}}">
                      <input type="hidden" name="att_year" value="{{ date('Y')}}">
                      <input type="hidden" name="month" value="{{ date('F')}}">
                   </tr>
                   @endforeach
                 </tbody>
               </table>
             <button class="btn btn-success float-right" type="submit">Take attendence</button>
             </form>
            </div>
         </div>
         
  </div>
@endsection
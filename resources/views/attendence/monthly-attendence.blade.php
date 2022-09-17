


@extends('dashboard')

@section('content')
  <div class="container">


         <div class="row mt-2">
          <div class="card" style="width:80%; margin:0 auto">
            <div class="card-head">
                 <p style="text-align:center; color:black; font-weight:bold;font-size:20px">Welcome Attendence Employee- {{ date('Y')}}</p>
             <div class="month mt-3 ml-5" style="width:100%; margin:0 auto">
               <a class="btn btn-primary btn-sm" href="{{route('january.attendence')}}">January</a>
               <a class="btn btn-warning btn-sm" href="{{route('february.attendence')}}">February</a>
               <a class="btn btn-success btn-sm" href="{{route('march.attendence')}}">March</a>
               <a class="btn btn-danger btn-sm" href="{{route('april.attendence')}}">April</a>
               <a class="btn btn-info btn-sm" href="{{route('may.attendence')}}">May</a>
               <a class="btn btn-primary btn-sm" href="{{route('june.attendence')}}">June</a>
               <a class="btn btn-warning btn-sm" href="{{route('july.attendence')}}">July</a>
               <a class="btn btn-success btn-sm" href="{{route('august.attendence')}}">Agust</a>
               <a class="btn btn-danger btn-sm" href="{{route('september.attendence')}}">September</a>
               <a class="btn btn-info btn-sm" href="{{route('octobar.attendence')}}">October</a>
               <a class="btn btn-warning btn-sm" href="{{route('novembar.attendence')}}">Novembar</a>
               <a class="btn btn-danger btn-sm" href="{{route('decembar.attendence')}}">Decembar</a
             </div>
            </div>

            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif

      <div class="card-body">
       
            <a>All attend</a>
            <span class="ml-2 text-danger">
               {{ date('F - Y')}}
            </span>
            <a class="btn btn-default btn-sm float-right" href="">add attend</a>
            <hr>
               <table class="table table-striped  mt-3">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Name</th>
                     <th>Photo</th>
                     <th>Date</th>
                     <th>Details</>
                     <th>Amount</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                        
                 <tbody>
                  @foreach( $attendence as $key => $row )
                   <tr>
                     <td>{{ ++$key }}</td>
                    <td>{{ $row->employee->name}}</td>
                    <td><img src="{{asset($row->employee->photo)}}" height="60" alt=""></td>
                     <td>{{ $row->edit_date}}</td>
                     <td>{{ $row->month}}</td>
                     <td>{{ $row->att_year}}</td>
                     <td>{{ $row->attendence}}</td>
            
                   </tr>
          
          @endforeach
                      
                 </tbody>
               </table>
            </div>
         </div>
    </div>
    
</div>
  </div>
      

                 
@endsection
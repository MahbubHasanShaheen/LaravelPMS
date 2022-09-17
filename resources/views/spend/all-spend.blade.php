


@extends('dashboard')

@section('content')
  <div class="container">
         <div class="row mt-2">
          <div class="card" style="width:70%; margin:0 auto">
            <div class="card-head">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif
</div>
      <div class="card-body">
            <a>All spend</a>
            <span class="ml-5">
         <a class="btn btn-warning btn-sm" href="{{ route('year.spend') }}">Year</a>
         <a class="btn btn-info btn-sm" href="{{ route('month.spend')}}">Month</a>
         <a class="btn btn-danger btn-sm" href="{{route('today.spend')}}">Today</a>
           </span>
            <a class="btn btn-primary btn-sm float-right" href="{{ url('spend/add-spend')}}">Add spend</a>
            <hr>
               <table class="table table-striped mt-3">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Details</th>
                     <th>Amount</th>
                     <th>Month</th>
                     <th>Date</th>
                     <th>Year</th>
                     <th>Action</th>
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $spends as $key => $spend )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $spend->details}}</td>
                     <td>{{ $spend->amount}}</td>
                     <td>{{ $spend->month}}</td>
                     <td>{{ $spend->spend_date}}</td>
                     <td>{{ $spend->year }}</td>
                 
                     <td>
                     <a class="btn btn-info btn-sm" href="{{ url('spend/view-spend/'.$spend->id )}}"><i class="fa fa-eye"></i></a>
                     <a class="btn btn-success btn-sm" href="{{ url('spend/edit-spend/'.$spend->id )}}"><i class="fa fa-pen"></i></a>
                     <a class="btn btn-danger btn-sm"  href="{{ url('spend/delete/'.$spend->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
                    </td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
            </div>
         </div>
    </div>
  </div>
      
@endsection
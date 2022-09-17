


@extends('dashboard')

@section('content')
  <div class="container">


         <div class="row mt-2">
          <div class="card" style="width:80%; margin:0 auto">
            <div class="card-head">
                 <p style="text-align:center; color:black; font-weight:bold;font-size:20px">Welcome - {{ date('Y')}}</p>
            <div class="month mt-3 ml-2" style="width:100%; margin:0 auto">
               <a class="btn btn-primary btn-sm" href="{{route('january.spend')}}">January</a>
               <a class="btn btn-warning btn-sm" href="{{route('february.spend')}}">February</a>
               <a class="btn btn-danger btn-sm" href="{{route('march.spend')}}">March</a>
               <a class="btn btn-success btn-sm" href="{{route('april.spend')}}">April</a>
               <a class="btn btn-primary btn-sm" href="{{route('may.spend')}}">May</a>
               <a class="btn btn-warning btn-sm" href="{{route('june.spend')}}">June</a>
               <a class="btn btn-danger btn-sm" href="{{route('july.spend')}}">July</a>
               <a class="btn btn-success btn-sm" href="{{route('august.spend')}}">August</a>
               <a class="btn btn-primary btn-sm" href="{{route('septembar.spend')}}">Septembar</a>
               <a class="btn btn-warning btn-sm" href="{{route('october.spend')}}">Octobar</a>
               <a class="btn btn-danger btn-sm" href="{{route('novembar.spend')}}">Novembar</a>
               <a class="btn btn-success btn-sm" href="{{route('december.spend')}}">Decembar</a>
            </div>




            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif
</>
      <div class="card-body">
       
            <a>All spend</a>
            <span class="ml-2 text-danger">
               {{ date('F - Y')}}
            </span>
            <a class="btn btn-default btn-sm float-right" href="{{ url('spend/add-spend')}}">add spend</a>
            <hr>
               <table class="table table-striped  mt-3">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Date</th>
                     <th>Details</>
                     <th>Amount</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                        
                 <tbody>
                  @foreach( $spends as $key => $spend )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $spend->spend_date}}</td>
                     <td>{{ $spend->details}}</td>
                     <td>{{ $spend->amount}}</td>
                   
                 
                     <td>
                     <a class="btn btn-success btn-sm" href="{{ url('spend/edit-month-spend/'.$spend->id )}}"><i class="fa fa-pen"></i></a>
                    </td>

             
                   </tr>
                   @endforeach
                   @php
                   $month= date('F');
                    $spendss =DB::table('spends')->where('month', $month)->sum('amount');
                    @endphp
                        <tr>
                            <th></th>
                            <th></th>
                            <th style="text-align:right">Total :</th>
                            <th>Tk. {{ $spendss }}.00</th>
                            <th></th>
                             
                        </tr>
                 </tbody>
               </table>
            </div>
         </div>
    </div>
    
</div>
  </div>
      

                 
@endsection



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

              


            <a>Today Spend</a>
            <span class="ml-2 text-red"> Date :
              @php
                echo date('d/m/y')
              @endphp
            </span>
            <a class="btn btn-success btn-sm float-right" href="{{ url('spend/all-spend')}}">all spend</a>

            <a class="btn btn-primary btn-sm float-right" href="{{ url('spend/add-spend')}}">add spend</a>
            <hr>
               <table class="table table-striped mt-3">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Details</th>
                     <th>Amount</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                        
                 <tbody>
                  @foreach( $spends as $key => $spend )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $spend->details}}</td>
                     <td>{{ $spend->amount}}</td>
                   
                 
                     <td>
                     <a class="btn btn-success btn-sm" href="{{ url('spend/edit-today-spend/'.$spend->id )}}"><i class="fa fa-pen"></i></a>
                    </td>

             
                   </tr>
                   @endforeach
                   @php
                    $date = date('d/m/y');
                    $spendss =DB::table('spends')->where('spend_date', $date)->sum('amount');
                    @endphp
                        <tr>
                            <th></th>
                            <th style="text-align:right">Total :</th>
                        <th>Tk. {{ $spendss }}.00</th>
                        </tr>
                 </tbody>
               </table>
            </div>
         </div>
    </div>
    

  </div>
      

                 
@endsection
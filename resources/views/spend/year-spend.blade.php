


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
       
            <a>Yearly Spend</a>
            <span class="ml-2 text-danger">
            @php
            echo date('Y');
            @endphp
            </span>
            <a class="btn btn-success btn-sm float-right" href="{{ url('spend/all-spend')}}">all spend</a>

            <a class="btn btn-primary btn-sm float-right" href="{{ url('spend/add-spend')}}">add spend</a>
            <hr>
               <table class="table table-striped mt-3">
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
                     <a class="btn btn-success btn-sm" href="{{ url('spend/edit-year-spend/'.$spend->id )}}"><i class="fa fa-pen"></i></a>
                    </td>
                   </tr>
                   @endforeach


                   @php
                    $year= date('Y');
                    $spendss =DB::table('spends')->where('year', $year)->sum('amount');
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
      

                 
@endsection
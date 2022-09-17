
@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-2">
            <div class="col-md-1"></div>
           <div class="col-md-10">

           @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

    </div>
    @endif

    @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif


              @if(Session::has('error-msg'))
              <p class="text-danger">{{ Session::get('error-msg') }}</p>
              @endif

           <div class="card card-primary">
              <div class="card-header">

         <a class="card-title">Update Today Spend</a>
         

    </div>


  <form  action="{{ url('spend/today-update/'.$today->id) }}" method="POST">
            @csrf 

        <div class="card-body">

        <div class="form-group">
            <label for="name">Sepend Details</label>
            <input type="text" class="form-control" name="details" value="{{ $today->details }}">
        </div>

        <div class="form-group">
            <label for="name">Sepend Amount</label>
            <input type="text" class="form-control" name="amount" value="{{ $today->amount }}">
        </div>

        <div class="form-group">
           
            <input type="hidden" class="form-control" name="month" value="{{ date('F')}}">
        </div>

        <div class="form-group">
           
            <input type="hidden" class="form-control" name="spend_date" value="{{ date('d/m/y') }}">
        </div>

        <div class="form-group">
            
            <input type="hidden" class="form-control" name="year" value="{{ date('Y') }}">
        </div>
   

        <!--<div class="form-group">
            <label for="">Month</label>
            <input type="text" class="form-control" name="month" value="{{ date('F')}}">
             
            <!--<select name="type" class="form-control">
                <option disabled="" selected="">Select Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                
                <option value="July">July</option>
                <option value="Agust">Agust</option>
                <option value="Septembar">Septembar</option>

                <option value="Octobar">Octobar</option>
                <option value="Novembar">Novembar</option>
                <option value="Decembar">Decembar</option>
            </select>-->
          
            

       <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</div>

</form>

    </div>
    <div class="col-md-1"></div>
  </div>
</div>
</div>


@endsection
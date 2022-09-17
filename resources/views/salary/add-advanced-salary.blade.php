@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-2">
            <div class="col-md-2"></div>
           <div class="col-md-8">

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

         <h3 class="card-title">Advanced Salary Provide</h3>
    </div>


  <form  action="{{ url('salary/advancedsalary-store') }}" method="POST">
            @csrf 
        <div class="card-body">

        <div class="form-group">
            <label for="">Employee</label>
            @php
              $employee=DB::table('employees')->get();
            @endphp
            <select name="employee_id" class="form-control">
                <option disabled="" selected="">Select Employee</option>
                @foreach( $employee as $emp )
                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                @endforeach
            </select>
          
        </div>


        <div class="form-group">
            <label for="">Month</label>
            <select name="month" class="form-control">
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
            </select>
          
        </div>

        <div class="form-group">
            <label for="">Year</label>
            <input type="text" class="form-control" name="year" placeholder="Enter year...">
        </div>

        <div class="form-group">
            <label for="">Advanced Salary</label>
            <input type="text" class="form-control" name="advanced_salary" placeholder="Enter advanced salary...">
        </div>

    

       <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</div>

</form>

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
</div>


@endsection
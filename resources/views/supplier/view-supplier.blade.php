@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-5">
            <div class="col-md-2"></div>
           <div class="col-md-8">

           <div class="card card-primary">
              <div class="card-header">

         <h3 class="card-title">Single Supplier</h3>
    </div>


  <form  action="" method="POST">
          
        <div class="card-body ml-5">
     <div class="row">
        <div class="col-md-6">

        <div class="form-group">
           
             <img id="image" src="{{ URL::to($single->photo) }}" height="60"/>
          
        </div>
   
        <div class="form-group">
            <label for="name">Supplier ID</label>
            <p>{{ $single->supplier_id }}</p>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <p>{{ $single->name }}</p>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <p>{{ $single->email }}</p>
        </div>

        <div class="form-group">
            <label for="">Phone No</label>
            <p>{{ $single->phone }}</p>
        </div>

      
        <div class="form-group">
            <label for="">Address</label>
            <p>{{ $single->address }}</p>
        </div>

        </div>


     <div class="col-md-6">
        <div class="form-group">
            <label for="">Bank Account No</label>
             
            @if( $single->banck_account == NULL )

            <p>None</p>

            @else()
            <p>{{ $single->account_number }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="">Account Name</label>

            @if( $single->account_name == NULL )
          <p>None</p>
            @else()
           <p>{{ $single->account_name }}</p>
           @endif

        </div>

        <div class="form-group">
            <label for="">Bank Name</label>
            <p>{{ $single->bank_name }}</p>
        </div>

        <div class="form-group">
            <label for="">Branch Name</label>
            <p>{{ $single->branch_name }}</p>
        </div>

        <div class="form-group">
            <label for="">City</label>
            <p>{{ $single->city }}</p>
        </div>


        <div class="form-group">
            <label for="exampleInputFile">Date</label>
           
             <p>{{ $single->created_at }}</p>
        </div>
        </div>
</div>
</div>
</form>

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
</div>


@endsection
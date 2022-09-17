@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-5">
            <div class="col-md-2"></div>
           <div class="col-md-8">

           <div class="card card-primary">
              <div class="card-header">

         <h3 class="card-title">Single Employee</h3>
    </div>


  <form  action="" method="POST">
          <div class="card-body">
        

<div class="row ml-5">
    <div class="col-md-6">

       <div class="form-group">
            <label for="exampleInputFile">Photo</label>
             <p><img id="image" src="{{ URL::to($single->photo) }}" height="60"/> </p>
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
            <label for="">National ID No</label>
            <p>{{ $single->nid_no }}</p>
        </div>

</div>



    <div class="col-md-6">
      <div class="form-group">
            <label for="">Address</label>
            <p>{{ $single->address }}</p>
        </div>

        <div class="form-group">
            <label for="">Experience</label>
            <p>{{ $single->experience }}</p>
        </div>

        <div class="form-group">
            <label for="">Salary</label>
            <p>{{ $single->salary }}</p>
        </div>

        <div class="form-group">
            <label for="">Vacation</label>
            <p>{{ $single->vacation }}</p>
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
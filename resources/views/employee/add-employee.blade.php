@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-5">
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

         <h3 class="card-title">Add New Employee</h3>
    </div>


  <form  action="{{ url('employee/employee-store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
        <div class="card-body">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter employee name...">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email"  placeholder="Enter email....">
        </div>

        <div class="form-group">
            <label for="">Phone No</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter phone no...">
        </div>


        <div class="form-group">
            <label for="">National ID No</label>
            <input type="text" class="form-control" name="nid_no" placeholder="Enter nid no...">
        </div>

        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter address...">
        </div>

        <div class="form-group">
            <label for="">Experience</label>
            <input type="text" class="form-control" name="experience" placeholder="Enter experience...">
        </div>

        <div class="form-group">
            <label for="">Salary</label>
            <input type="text" class="form-control" name="salary" placeholder="Enter salary...">
        </div>

        <div class="form-group">
            <label for="">Vacation</label>
            <input type="text" class="form-control" name="vacation" placeholder="Enter vacation...">
        </div>

        <div class="form-group">
            <label for="">City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter city...">
        </div>

          <div class="form-group">
            <label for="exampleInputFile">Photo</label>
             <img id="image" src="#" />
                <input type="file"  name="photo" accept="image/*" class="onload" required  onchange="readURL(this);">
                
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
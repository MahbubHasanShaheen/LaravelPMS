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

    
    @if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('danger') }}
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

         <h3 class="card-title">Update Employee</h3>
    </div>


  <form  action="{{ url('employee/update/'.$employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
        <div class="card-body">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email"  value="{{ $employee->email }}">
        </div>

        <div class="form-group">
            <label for="">Phone No</label>
            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
        </div>


        <div class="form-group">
            <label for="">National ID No</label>
            <input type="text" class="form-control" name="nid_no" value="{{ $employee->nid_no }}">
        </div>

        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $employee->address }}">
        </div>

        <div class="form-group">
            <label for="">Experience</label>
            <input type="text" class="form-control" name="experience" value="{{ $employee->experience }}">
        </div>

        <div class="form-group">
            <label for="">Salary</label>
            <input type="text" class="form-control" name="salary" value="{{ $employee->salary }}">
        </div>

        <div class="form-group">
            <label for="">Vacation</label>
            <input type="text" class="form-control" name="vacation" value="{{ $employee->vacation }}">
        </div>

        <div class="form-group">
            <label for="">City</label>
            <input type="text" class="form-control" name="city" value="{{ $employee->city }}">
        </div>

        <div class="form-group">
            <label for="">New Photo</label>
             <img id="image" src="#" height="50" />
                <input type="file"  name="photo" onchange="readURL(this);" >
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Photo</label>
             <img id="image" src="{{ URL::to($employee->photo) }}"  height="50" />
             <!-- Previous photo sent----------->
             <input type="hidden" name="old_photo" value="{{ $employee->photo }}">
                 
        </div>
           
            

       <div class="card-footer">
         <button type="submit" class="btn btn-primary">Update</button>
      </div>
</div>

</form>

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
</div>

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function (e){
         $('#image')
         .attr('src', e.target.result)
         .width(80)
         .height(80);
      };
      reader.readAsDataURL(input.files[0]);

    }
   }
</script>
@endsection
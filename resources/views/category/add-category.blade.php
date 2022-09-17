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

         <h3 class="card-title">Add NewCategory</h3>
    </div>


  <form  action="{{ url('category/category-store') }}" method="POST">
            @csrf 
        <div class="card-body">

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="category_name" placeholder="Enter category name...">
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
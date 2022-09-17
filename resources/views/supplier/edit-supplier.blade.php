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

         <h3 class="card-title">Update Supplier</h3>
    </div>


  <form  action="{{  url('supplier/update/'.$supplier->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
        <div class="card-body">

        <div class="form-group">
            <label for="name">Supplier ID</label>
            <input type="text" class="form-control" name="supplier_id" value="{{ $supplier->supplier_id }}">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $supplier->name }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $supplier->email}}">
        </div>

        <div class="form-group">
            <label for="">Phone No</label>
            <input type="text" class="form-control" name="phone" value="{{ $supplier->phone }}">
        </div>


        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $supplier->address }}">
        </div>

    
            <div class="form-group">
            <label for="">Suppier Type</label>
            <select name="type" class="form-control">
                <option disabled="" selected="">Type Select</option>

                <option value="Distibutor">Dsitibutor</option>
                <option value="Hole Saller">Hole Saler</option>
                <option value="Brochuri">Brochuri</option>
            </select>
          
        </div>

        <div class="form-group">
            <label for="">Bank Account No</label>
            <input type="text" class="form-control" name="account_number" value="{{ $supplier->account_number }}">
        </div>

        <div class="form-group">
            <label for="">Account Name</label>
            <input type="text" class="form-control" name="account_name" value="{{ $supplier->account_name }}">
        </div>

        <div class="form-group">
            <label for="">Bank Name</label>
            <input type="text" class="form-control" name="bank_name" value="{{ $supplier->bank_name }}">
        </div>

        <div class="form-group">
            <label for="">Branch Name</label>
            <input type="text" class="form-control" name="branch_name" value="{{ $supplier->branch_name }}">
        </div>

        <div class="form-group">
            <label for="">City</label>
            <input type="text" class="form-control" name="city" value="{{ $supplier->city }}">
        </div>

        <div class="form-group">
            <label for="">New Photo</label>
             <img id="image" src="#" height="50" />
                <input type="file"  name="photo" onchange="readURL(this);" >
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Photo</label>
             <img id="image" src="{{ URL::to($supplier->photo) }}"  height="50" />
             <!-- Previous photo sent----------->
             <input type="hidden" name="old_photo" value="{{ $supplier->photo }}">
                 
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
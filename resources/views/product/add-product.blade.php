@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-5">
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

         <h3 class="card-title">Add New Product</h3>
    </div>


  <form  action="{{ url('product/product-store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
        <div class="card-body">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Enter product name...">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            @php
              $category=DB::table('categories')->get();
            @endphp
            <select name="cat_id" class="form-control">
                <option disabled="" selected="">Select Category</option>
                @foreach( $category as $cat )
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Suplier</label>
            @php
              $supplier=DB::table('suppliers')->get();
            @endphp
            <select name="sup_id" class="form-control">
                <option disabled="" selected="">Select Suplier</option>
                @foreach( $supplier as $sup )
                <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="">Brands Name</label>
            <input type="text" class="form-control" name="brand" placeholder="Enter brand...">
        </div>

        <div class="form-group">
            <label for="">Product Code</label>
            <input type="text" class="form-control" name="product_code" placeholder="Enter address...">
        </div>

        <div class="form-group">
            <label for="">Waranty</label>
            <input type="text" class="form-control" name="waranty" placeholder="Enter waranty...">
        </div>

        <div class="form-group">
            <label for="">Quantity</label>
            <input type="text" class="form-control" name="product_qty" placeholder="Enter Quantity...">
        </div>

</div>


      <div class="col-md-6">
        <div class="form-group">
            <label for="">Grage</label>
            <input type="text" class="form-control" name="product_garage" placeholder="Enter garage...">
        </div>

        <div class="form-group">
            <label for="">Product Route</label>
            <input type="text" class="form-control" name="product_route" placeholder="Enter Quantity...">
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Photo</label>
             <img id="image" src="#" />
                <input type="file"  name="product_image" accept="image/*" class="onload" required  onchange="readURL(this);">      
        </div>

        <div class="form-group">
            <label for="">Purchase Date</label>
            <input type="text" class="form-control" name="purchase_date" placeholder="Enter purchase date...">
        </div>

        <div class="form-group">
            <label for="">Expire Date</label>
            <input type="text" class="form-control" name="expire_date" placeholder="Enter expire date...">
        </div>

        <div class="form-group">
            <label for="">Purchase Price</label>
            <input type="text" class="form-control" name="purchase_price" placeholder="Enter Purchase proce...">
        </div>

        <div class="form-group">
            <label for="">Selling Price</label>
            <input type="text" class="form-control" name="selling_price" placeholder="Enter selling proce...">
        </div>

       

       <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
</div>
</div>
</form>

    </div>
    <div class="col-md-1"></div>
  </div>
</div>
</div>


@endsection
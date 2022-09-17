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


  <form  action="{{ url('product/update/'.$product->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf 
        <div class="card-body">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
        </div>

        <div class="form-group">
    <label for="form-control-lebel">supplier</label>
           @php
              $category=DB::table('categories')->get();
            @endphp
            <select name="cat_id" class="form-control">
                @foreach( $category as $cat )
                <optoin disabled="" selected="">{{ $cat->category_name }}</optoin>
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
                @foreach( $supplier as $sup )
                <optoin disabled="" selected="">{{ $sup->name }}</optoin>
                <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="">Brands Name</label>
            <input type="text" class="form-control" name="brand" value="{{ $product->brand }}">
        </div>

        <div class="form-group">
            <label for="">Product Code</label>
            <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}">
        </div>

        <div class="form-group">
            <label for="">Waranty</label>
            <input type="text" class="form-control" name="waranty" value="{{ $product->waranty }}">
        </div>

        <div class="form-group">
            <label for="">Quantity</label>
            <input type="text" class="form-control" name="product_qty" value="{{ $product->product_qty }}">
        </div>

</div>

  

      <div class="col-md-6">
      <div class="form-group">
            <label for="">New Image</label>
             <img id="image" src="#" height="50" />
                <input type="file"  name="product_image" onchange="readURL(this);" >
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Old Image</label>
             <img id="image" src="{{ URL::to($product->product_image) }}"  height="50" />
             <!-- Previous photo sent----------->
             <input type="hidden" name="old_image" value="{{ $product->product_image }}">
                 
        </div>


        <div class="form-group">
            <label for="">Grage</label>
            <input type="text" class="form-control" name="product_garage" value="{{ $product->product_garage }}">
        </div>

        <div class="form-group">
            <label for="">Product Route</label>
            <input type="text" class="form-control" name="product_route" value="{{ $product->product_route }}">
        </div>

     

        <div class="form-group">
            <label for="">Purchase Date</label>
            <input type="text" class="form-control" name="purchase_date" value="{{ $product->purchase_date }}">
        </div>

        <div class="form-group">
            <label for="">Expire Date</label>
            <input type="text" class="form-control" name="expire_date" value="{{ $product->expire_date }}">
        </div>

        <div class="form-group">
            <label for="">Purchase Price</label>
            <input type="text" class="form-control" name="purchase_price" value="{{ $product->purchase_price }}">
        </div>

        <div class="form-group">
            <label for="">Selling Price</label>
            <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
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
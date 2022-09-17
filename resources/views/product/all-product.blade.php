@extends('dashboard')

@section('content')
  <div class="container">
         <div class="row ml-2 mt-2">
      <div class="card" style="width:90%; margin:0 auto">
        <div class="card-head">
                     
        <div class="product">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
     </button>
     </div>
    @endif
   </div>
</div>
       
         <div class="card-body">
          <div class="blockquote">
            <a class="text-danger float-left mb-2 mt-2"><strong>All product</strong></a>
            <a href="{{ route('add.product')}}" class="btn btn-info btn-sm float-right mb-2 mt-2">Add New</a>
         </div>
               <table class="table table-striped table-bordered">
                 <thead class="text-uppercase">
                   <tr>
                     <th>SL/No</th>
                     <th>Product Name</th>
                     <th>Category</th>
                     <th>Suplier</th>
                     <th>Brand</th>
                     <th>Image</th>
                     <th>Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                    
                 <tbody class="text-default">
                 @foreach( $products as $key => $product )
                   <tr>
                  
                     <td>{{ ++$key }}</td>
                     <td>{{ $product->product_name}}</td>
                     <td>{{ $product->category->category_name}}</td>
                     <td>{{ $product->supplier->name}}</td>
                     <td>{{ $product->brand}}</td>
                     <td><img src="{{ asset($product->product_image) }}" height="50" width="45">
                     <td> 
                        @if($product->status == 1)
                            <span class="badge badge-success">Inactive</span>
                            @else
                            <span class="badge badge-danger">Active</span>
                        @endif 
                      
                        
                        @if($product->status == 1)
                          <a class="btn btn-danger btn-sm float-right" href="{{ url('product/inactive/'.$product->id )}}"><i class="fa fa-arrow-down"></i></a>
                          @else
                          <a class="btn btn-success btn-sm float-right" href="{{ url('product/active/'.$product->id )}}"><i class="fa fa-arrow-up"></i></a>
                          @endif
                      </td>

                     <td>
                        <a class="btn btn-info btn-sm" href="{{ url('product/view-product/'.$product->id)}}"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-success btn-sm" href="{{ url('product/edit-product/'.$product->id )}}"><i class="fa fa-pen"></i></a>
                        <a class="btn btn-danger btn-sm"  href="{{ url('product/delete/'.$product->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
                    </td>
                  
              
                   </tr>
                   @endforeach
                 </tbody>
               </table>
            </div>

            </div>
</div>
         <script>
function remove(el) {
  var element = el;
  element.remove();
}
         </script>
         
  </div>
@endsection
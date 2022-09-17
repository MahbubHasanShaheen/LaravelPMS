@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-5">
            <div class="col-md-1"></div>
           <div class="col-md-10">

           <div class="card card-primary">
              <div class="card-header">

         <a class="card-title">Product Details</a>
         <a class="float-right btn btn-info" href="{{route('all.product')}}">All Product</a>
    </div>



          
        <div class="card-body ml-2">
     <div class="row">

     <div class="col-md-6">
        <table class="table table-striped">
        <tbody>
            <tr>
              <th>Product Image</th>
              <td style="width:100px; padding-left:40px">:</td>
              <td><img  src="{{ asset($single->product_image) }}" height="120"/></td>
            </tr>

            <tr>
             <th>Product Name</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->product_name }}</td>
            </tr>

            
            <tr>
             <th>Category</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->category->category_name }}</td>
            </tr>
     
              
            <tr>
             <th>Supplier</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->supplier->name }}</td>
            </tr>
    

            <tr>
             <th>Code</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->product_code }}</td>
            </tr>

            <tr>
             <th>Product Size</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->product_size }}</td>
            </tr>
           
      </tbody>

</table>
</div>
    



    <div class="col-md-6">
        <table class="table table-striped">
         <tbody>

         <tr>
             <th>Garage</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->product_garage }}</td>
            </tr>

            <tr>
             <th>Route</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->product_route }}</td>
            </tr>

   

            <tr>
             <th>Purchase Date</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->purchase_date }}</td>
            </tr>

            <tr>
             <th>Expire Date</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->expire_date }}</td>
            </tr>

            <tr>
             <th>Purchase Price</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->purchase_price }}.00</td>
            </tr>

            <tr>
             <th>Selling Price</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->selling_price }}.00</td>
            </tr>

            <tr>
             <th>Last Update</th>
              <td style="width:100px; padding-left:40px">:</td> 
              <td>{{ $single->updated_at }}</td>
            </tr>

        
          <tr>
            @if($single->status == 1)
            <th>Stock</th>
              <td style="color:red; width:100px; padding-left:40px">:</td>
              <td>Aviable</td>
             @else
              <th>Stock</th>
              <td style="color:red; width:100px; padding-left:40px">:</td>
              <td>Empty</td>
             @endif
         </tr>
</tbody>
</table>
</div>

</div>
</div>
  </div>
</div>
<div class="col-md-1">
</div>
</div>
</div>

@endsection
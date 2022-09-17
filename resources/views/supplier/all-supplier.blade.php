@extends('dashboard')

@section('content')
  <div class="container mt-5">
         <div class="row ml-5">

         
            <div class="custloyee">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif
            <a>All supplier</a>
            <a class="btn btn-primary btn-sm float-right" href="{{ url('supplier/add-supplier')}}">Add Supplier</a>
            <hr>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Supplier ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Address</th>
                     <th>Type</th>
                     <th>Action</th>
                     
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $suppliers as $key => $supp )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $supp->supplier_id}}</td>
                     <td>{{ $supp->name}}</td>
                     <td>{{ $supp->email}}</td>
                     <td>{{ $supp->phone}}</td>
                     <td>{{ $supp->address}}</td>
                     <td>{{ $supp->type}}</td>
                     <td>
                     <a class="btn btn-info btn-sm" href="{{ url('supplier/view-supplier/'.$supp->id )}}"><i class="fa fa-eye"></i></a>
                     <a class="btn btn-success btn-sm" href="{{ url('supplier/edit-supplier/'.$supp->id )}}"><i class="fa fa-pen"></i></a>
                     <a class="btn btn-danger btn-sm"  href="{{ url('supplier/delete/'.$supp->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
                    </td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
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
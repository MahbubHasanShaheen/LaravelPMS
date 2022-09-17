@extends('dashboard')

@section('content')
  <div class="container">
         <div class="row ml-5">
       <div class="col-md-8">
       @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
  </div>
    @endif

         <div class="card mt-5">
           <div class="card-body">
           <a>All Category</a>
            <a class="btn btn-info btn-sm float-right mb-2" href="{{route('add.category')}}">Add Category</a>
           <div class="category">
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Category Name</th>
                     <th>Action</th>
                     
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $categories as $key => $cat )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $cat->category_name}}</td>
               
                     <td>
                     <a class="btn btn-info" href="{{ url('category/view-category/'.$cat->id )}}"><i class="fa fa-eye"></i></a>
                     <a class="btn btn-success" href="{{ url('category/edit-category/'.$cat->id )}}"><i class="fa fa-pen"></i></a>
                     <a class="btn btn-danger"  href="{{ url('category/delete/'.$cat->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
                    </td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
            </div>
         </div>
       </div>
</div>
</div>
</div>
<script>
function remove(el) {
  var element = el;
  element.remove();
}
         </script>
@endsection
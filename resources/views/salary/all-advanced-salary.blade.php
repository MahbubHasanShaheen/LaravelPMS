@extends('dashboard')

@section('content')
  <div class="container">
         <div class="row ml-5">
      <div class="advanced_salary">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
    @endif
     <div class="row">
        <div class="col-md-11">
       <div class="card mt-2">
        <div class="card-body">
            <a class="text-dark float-left mb-2 mt-2"><h4>Advanced Salary</h4></a>
            <a href="{{ route('add.advanced.salary')}}" class="btn btn-info btn-sm float-right mb-2 mt-2">Add New</a>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Name</th>
                     <th>photo</th>
                     <th>Salary</th>
                     <th>Advanced Salary</th>
                     <th>Month</>
                     <th>Year</th>
                     <th>Action</th>
                     
                   </tr>
                 </thead>

                 <tbody>
                  @foreach( $advanced_salaries as $key => $av_salary )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $av_salary->employee->name }}</td>
                     <td><img src="{{ asset($av_salary->employee->photo) }}" height="50" width="60" alt=""></td>
                     <td>{{ $av_salary->employee->salary}}</td>
                     <td>{{ $av_salary->advanced_salary }}</td>
                     <td>{{ $av_salary->month }}</td>
                     <td>{{ $av_salary->year }}</td>
                     <td>
                     <a class="btn btn-info" href="{{ url('salary/view-salary/'.$av_salary->id )}}"><i class="fa fa-eye"></i></a>
                     <a class="btn btn-success" href="{{ url('salary/edit-salary/'.$av_salary->id )}}"><i class="fa fa-pen"></i></a>
                     <a class="btn btn-danger"  href="{{ url('salary/delete/'.$av_salary->id )}}" onclick=" return confirm('Are sure delete product-- ?')"><i class="fa fa-trash"></i></a>
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
         
  </div>
@endsection
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
            <a class="text-dark float-left mb-2 mt-2">
                <h4>Pay Salary : <span style="color:brown">{{ date("F Y")}}</span></h4>
                
            </a>
            <a href="{{ route('add.advanced.salary')}}" class="btn btn-info btn-sm float-right mb-2 mt-2">Add New</a>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>SL/No</th>
                     <th>Name</th>
                     <th>photo</th>
                     <th>Salary</th>
                     <th>Month</th>
                     <th>Advanced</th>
                     <th>Action</th>
                     
                   </tr>
                 </thead>

             <!--  Return advanced salary of employee      -->
              @php
              use App\Models\Advanced_salary;
              use App\Models\Salary;
              use App\Models\Employee;
               $month = date("F", strtotime('-1 month'));
                
              
               $employee = Employee::latest()->get();
               $salary = Advanced_salary::where('month', $month)->get();
              @endphp

             <!-- End php code      --------->

                 <tbody>
                  @foreach( $employee as $key => $emp )
                   <tr>
                     <td>{{ ++$key }}</td>
                     <td>{{ $emp->name }}</td>
                     <td><img src="{{ asset($emp->photo) }}" height="50" width="60" alt=""></td>
                     <td>{{ $emp->salary }}</td>
                     <td><span class="badge badge-success">{{ date("F", strtotime('-1 month'))}}</span></td>
                     <td>ACE</td>
                     <td>
                     <a class="btn btn-primary" href="{{ url('salary/view-salary/'.$emp->id )}}">Pay Now</a>
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
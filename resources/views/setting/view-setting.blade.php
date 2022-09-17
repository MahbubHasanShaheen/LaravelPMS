@extends('dashboard')

@section('content')

 <div class="container">
         <div class="row mt-5">
            <div class="col-md-2"></div>
           <div class="col-md-8">

           <div class="card card-primary">
              <div class="card-header">

         <h3 class="card-title">Company Info</h3>
    </div>


        <div class="card-body ml-5">
<div class="row ml-5"> 
   <div class="col-md-6">
        <div class="form-group">
        
             <p><img id="image" src="{{ asset($setting->logo) }}" height="60"/> </p>
          </div>



        <div class="form-group">
            <label for="name">Company Name</label>
            <p>{{ $setting->company_name }}</p>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <p>{{ $setting->email }}</p>
        </div>

        <div class="form-group">
            <label for="">Phone No</label>
            <p>{{ $setting->phone }}</p>
        </div>

      
        <div class="form-group">
            <label for="">Address</label>
            <p>{{ $setting->address }}</p>
        </div>
</div>



<div class="col-md-6">
        <div class="form-group">
            <label for="">City</label>
            <p>{{ $setting->city }}</p>
        </div>

        
<div class="col-md-6">
        <div class="form-group">
            <label for="">Country</label>
            <p>{{ $setting->country }}</p>
        </div>
        
       

        <div class="form-group">
            <label for="">Zipecode</label>
            <p>{{ $setting->zipcode }}</p>
        </>


        <div class="form-group">
            <label for="exampleInputFile">Date</label>
           
             <p>{{ $setting->created_at }}</p>
        </>
   </div> 
</div>
</div>
</form>

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
 </div>


@endsection
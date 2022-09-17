
<!DOCTYPE html>
<html lang="en">
<head>
 @include('layouts.inc._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Navabr -->

@include('layouts.inc._navbar')

 
  
@include('layouts.inc._sidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">
 
        @yield('content')


   </div>
  <!------------Footer area--------------------->
      @include('layouts.inc._footer')


</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img')}}/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CSD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img')}}/ssn.jpg" class="img-circle elevation-2" alt="User Image">
        </div>

        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name ?? ''}}</a>
        </div>
      </div>-->

 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
            POS
            
              </p>
            </a>
    

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
             Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.employee')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add New Employee</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="{{ route('all.employee')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Employee</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
              Attendence
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('take.attendence')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Take Attendence</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{route('all.attendence')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Attendence</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{route('monthly.attendence')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Monthly Attendence</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
             Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.customer')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="{{ route('all.customer')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Customer</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
              Supplier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.supplier')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add Supplier</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('all.supplier')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Supplier</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
               Salary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.advanced.salary')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add Advanced Salary</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('all.advanced.salary')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Advanced Salary</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('pay.salary')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Pay Salary</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('lastmonth.salary')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Last Month Salary</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
             Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.category')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('all.category')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
             Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.product')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('all.product')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('import.product')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Import Product</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
             Spends
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.spend')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Add Spend</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('all.spend')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>All Spend</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('today.spend')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Daily Spend</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('month.spend')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Monthly Spend</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('year.spend')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Yearly Spend</p>
                </a>
              </li>
            </ul>
          </li>

        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
            Sales Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.product')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>First</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('all.product')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Second</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
             Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="{{ route('all.setting')}}" class="nav-link">
                <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

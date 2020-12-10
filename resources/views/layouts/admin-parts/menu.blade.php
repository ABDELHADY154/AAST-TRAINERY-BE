 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="/admin-style/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/admin-style/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Starter Pages
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Active Page</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Inactive Page</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Simple Link
                             <span class="right badge badge-danger">New</span>
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

 {{-- <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar" ">
     <!-- Sidebar - Brand -->
     <a href=" {{route('home')}}" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
 <div class="sidebar-brand-icon ">
     AAST
 </div>
 <div class="sidebar-brand-text mx-3">Trainery</div>
 </a>

 <hr class="sidebar-divider my-0">

 <li class="nav-item {{ Route::currentRouteName() == 'home'? 'active' : '' }}">
     <a class="nav-link" href="index.html">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>Dashboard</span></a>
 </li>

 <hr class="sidebar-divider">

 <div class="sidebar-heading">
     Admin
 </div>


 <li class="nav-item">
     <a class="nav-link" href="charts.html">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>Users</span></a>
 </li>
 <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-fw fa-cog"></i>
         <span>Components</span>
     </a>
     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Custom Components:</h6>
             <a class="collapse-item" href="buttons.html">Buttons</a>
             <a class="collapse-item" href="cards.html">Cards</a>
         </div>
     </div>
 </li>



 <hr class="sidebar-divider d-none d-md-block">

 <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
 </div>

 </ul> --}}

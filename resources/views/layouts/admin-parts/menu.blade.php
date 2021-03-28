 <aside class="main-sidebar sidebar-dark-primary elevation-4" style=" background-color: #1E4274">
     <a href="{{route('home')}}" class="brand-link text-center">
         <img src="/admin-style/Images/iconw.png" alt="Trainery Logo" class="brand-image img-circle " style="opacity: .8">
         <span class="brand-text font-weight-light mr-5 ">AAST Trainery</span>
     </a>

     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/admin-style/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
             </div>
             <div class="info">
                 <a href="#" class="d-block text-wrap">{{auth()->user()?auth()->user()->name:''}}</a>
             </div>
         </div>

         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="{{route('home')}}" class="nav-link {{ Route::currentRouteName() == 'home'? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href=" #" class="nav-link ">
                         <i class="fas fa-users mr-2"></i>
                         <p>
                             Users
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('company.index')}}" class="nav-link {{ Route::currentRouteName() == 'company.index'? 'active' : '' }}">
                                 <i class="fas fa-building mr-2"></i>
                                 <p>Company</p>
                             </a>
                         </li>
                     </ul>
                 </li>

             </ul>
         </nav>

     </div>
 </aside>

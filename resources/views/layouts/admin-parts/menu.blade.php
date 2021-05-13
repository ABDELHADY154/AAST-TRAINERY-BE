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
                 <li class="nav-item {{ Route::currentRouteName() == 'company.index' ||Route::currentRouteName() == 'coach.index' || Route::currentRouteName() == 'trainingAdvisor.index' || Route::currentRouteName() == 'student.index'? 'menu-open' : '' }}">
                     <a href=" #" class="nav-link">
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
                         <li class="nav-item">
                             <a href="{{route('coach.index')}}" class="nav-link {{ Route::currentRouteName() == 'coach.index'? 'active' : '' }}">
                                 <i class="fas fa-user-tie mr-2"></i>
                                 <p>Coach</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('trainingAdvisor.index')}}" class="nav-link {{ Route::currentRouteName() == 'trainingAdvisor.index'? 'active' : '' }}">
                                 <i class="fas fa-user-tie mr-2"></i>
                                 <p>Training Advisors</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('student.index')}}" class="nav-link {{ Route::currentRouteName() == 'student.index'? 'active' : '' }}">

                                 <i class="fas fa-user-graduate mr-2"></i>
                                 <p>Students</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item {{ Route::currentRouteName() == 'companyInternshipPost.index' || Route::currentRouteName() == 'trainingAdvisorPost.index' || Route::currentRouteName() == 'promotedPost.index'|| Route::currentRouteName() == 'adsPost.index'? 'menu-open' : '' }}">
                     <a href=" #" class="nav-link ">
                         <i class="fas fa-stream mr-2"></i>
                         <p>
                             Internship Posts
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('companyInternshipPost.index')}}" class="nav-link {{ Route::currentRouteName() == 'companyInternshipPost.index'? 'active' : '' }}">
                                 <i class="fas fa-building mr-2"></i>
                                 <p>Company Posts</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('trainingAdvisorPost.index')}}" class="nav-link {{ Route::currentRouteName() == 'trainingAdvisorPost.index'? 'active' : '' }}">
                                 <i class="far fa-file-alt mr-2"></i>
                                 <p>Advisor Posts</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('promotedPost.index')}}" class="nav-link {{ Route::currentRouteName() == 'promotedPost.index'? 'active' : '' }}">
                                 <i class="fas fa-location-arrow mr-2"></i>
                                 <p>Promoted Posts</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('adsPost.index')}}" class="nav-link {{ Route::currentRouteName() == 'adsPost.index'? 'active' : '' }}">
                                 <i class="fas fa-ad mr-2"></i>
                                 <p>Ads Posts</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item {{ Route::currentRouteName() == 'session.index' ? 'menu-open' : '' }}">
                     <a href=" #" class="nav-link ">
                         <i class="fas fa-chalkboard-teacher mr-2"></i>
                         <p>
                             Career Coaching
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('session.index')}}" class="nav-link {{ Route::currentRouteName() == 'session.index'? 'active' : '' }}">
                                 <i class="fas fa-chalkboard mr-2"></i>
                                 <p>Sessions</p>
                             </a>
                         </li>

                     </ul>
                 </li>
             </ul>
         </nav>

     </div>
 </aside>

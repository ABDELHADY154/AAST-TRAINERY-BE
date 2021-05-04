 <aside class="main-sidebar sidebar-dark-primary elevation-4" style=" background-color: #1E4274">
     <a href="<?php echo e(route('home')); ?>" class="brand-link text-center">
         <img src="/admin-style/Images/iconw.png" alt="Trainery Logo" class="brand-image img-circle " style="opacity: .8">
         <span class="brand-text font-weight-light mr-5 ">AAST Trainery</span>
     </a>

     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/admin-style/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
             </div>
             <div class="info">
                 <a href="#" class="d-block text-wrap"><?php echo e(auth()->user()?auth()->user()->name:''); ?></a>
             </div>
         </div>

         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'home'? 'active' : ''); ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href=" #" class="nav-link ">
                         <i class="fas fa-users mr-2 ml-1"></i>
                         <p>
                             Users
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo e(route('company.index')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'company.index'? 'active' : ''); ?>">
                                 <i class="fas fa-building mr-2"></i>
                                 <p>Company</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo e(route('trainingAdvisor.index')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'trainingAdvisor.index'? 'active' : ''); ?>">
                                 <i class="fas fa-user-tie mr-2"></i>
                                 <p>Training Advisors</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo e(route('student.index')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'student.index'? 'active' : ''); ?>">

                                 <i class="fas fa-user-graduate mr-2"></i>
                                 <p>Students</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item">
                     <a href=" #" class="nav-link ">
                         <i class="fas fa-stream mr-2 ml-1"></i>
                         <p>
                             Internship Posts
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo e(route('companyInternshipPost.index')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'company.index'? 'active' : ''); ?>">
                                 <i class="fas fa-building mr-2"></i>
                                 <p>Company Posts</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo e(route('trainingAdvisorPost.index')); ?>" class="nav-link <?php echo e(Route::currentRouteName() == 'company.index'? 'active' : ''); ?>">
                                 <i class="far fa-file-alt mr-2"></i>
                                 <p>Advisor Posts</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>

     </div>
 </aside>
<?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/layouts/admin-parts/menu.blade.php ENDPATH**/ ?>
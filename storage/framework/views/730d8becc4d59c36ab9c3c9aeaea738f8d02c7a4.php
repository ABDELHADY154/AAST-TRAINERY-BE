   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <ul class="navbar-nav">
           <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
           </li>
           
       </ul>

       <!-- SEARCH FORM -->
       

       <!-- Right navbar links -->
       <ul class="navbar-nav ml-auto">

           <!-- Messages Dropdown Menu -->
           
           <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                   <i class="fas fa-expand-arrows-alt"></i>
               </a>
           </li>
           
           <li class="nav-item">
               <form action="<?php echo e(route("logout")); ?>" method="post" class="form-inline">
                   <?php echo csrf_field(); ?>
                   <button type="submit" class="btn btn-danger">Logout</button>
               </form>
           </li>
       </ul>
   </nav>
   <!-- /.navbar -->
<?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/layouts/admin-parts/navbar.blade.php ENDPATH**/ ?>
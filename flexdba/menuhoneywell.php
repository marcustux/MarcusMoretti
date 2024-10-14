<?php
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

include("db_conectflexbda.php"); 
$entornoActual_connect = $entornoActual;
include("db_conectflexbdainit.php"); 
$entornoActual_connectinit = $entornoActual;


?>
  <!-- Navbar --> <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="homeflexbda.php" class="nav-link">Home</a>
      </li>
  
    </ul>

 
  </nav>
 

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
 
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
               <a href="homeflexbda.php" class="nav-link">

                <?php if($_SESSION['flexesdchandeal'] == 'FIPLEX_SI') : ?>
                  <img src="logochico_fiplex.png"  class="brand-image"  >
                <?php else : ?>
                  <img src="logochico.png"  class="brand-image"  >
                <?php endif; ?>

               </a>
          </li>

          <li class="nav-item">
   
            <a href="homeflexbda.php  " class="nav-link">          
              <p>              
               Account: <?php echo 	$_SESSION["flexbdah"] ;?><br> User: <?php echo 	$_SESSION["flexbdac"] ;?>
               </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="listprojects.php?searchProcessed=0" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>                
                Project List
              
              </p>
            </a>
          </li>
      
      <?php

      if ( 	$_SESSION["flexbdag"]  == "fiplexdev" || $_SESSION["flexbdag"]  == "ing" || $_SESSION["flexbdag"]  == "RSM" || $_SESSION["flexbdag"]  == "BDABDM"){

      ?>
          <li class="nav-item">
            <a href="listprojects.php?searchProcessed=1&year=2024" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>                
                Project Processed List
              
              </p>
            </a>
          </li>
          
      <?php
      }
      ?>
          <li class="nav-item has-treeview">
            <a href="download.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Resources
               
              
              </p>

            </a>
         
          </li>
          <li class="nav-item">
            <a href="changepassuser.php" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>                
Change Password
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>                
Logout
              
              </p>
            </a>
          </li>
         
          <?php if($entornoActual_connect=='DEV' && $entornoActual_connectinit=='DEV') : ?>
            <img src="entornodevtst.jpg"  class="brand-image"  >
          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>                
            ENVIRONMENT 1
            </p>
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>                
            <?php echo $entornoActual_connect; ?>
            <!-- acall -->
            </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>                
            ENVIRONMENT 2
            </p>
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>                
            <?php echo $entornoActual_connectinit; ?>
            <!-- acall -->
            </p>
            </a>
          </li>

          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
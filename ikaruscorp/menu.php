<?php
 global $idmenu;
 $vidmenu = $idmenu;
 
?> 
      <!-- Fixed navbar -->
      <nav class=" navbar navbar-expand-md navbar-dark fixed-top bg-dark  ">
        
        <a class="navbar-brand textoikarusmenu " href="index.php">IKARUS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item  ">
              <a class="nav-link " href="index.php"><span class='<?php if ($vidmenu==0) { echo "activemenuikarus"; } ?>'>HOME </span> </a>
            </li>
         
            <li class="nav-item">
                <a class="nav-link text-light " href="about.php"> <span class='<?php if ($vidmenu==1) { echo "activemenuikarus"; } ?>'> ABOUT US </span></a>
              </li>
              <li class="nav-item dropdown">
                

                <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <span class='<?php if ($vidmenu==2) { echo "activemenuikarus"; } ?>'> SERVICES</span>
                </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="services.php?id=0">RF Service</a>
                <a class="dropdown-item" href="services1.php?id=1">Automation</a>
                <a class="dropdown-item" href="services2.php?id=2">Software Factory</a>
                <a class="dropdown-item" href="services3.php?id=3">Cybersecurity</a>
                <a class="dropdown-item" href="services4.php?id=4">Financial Services</a>
                 



              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="index.php#contactomm">CONTACT US</a>
              </li>
            

          </ul>
         
        </div>
      </nav>
    
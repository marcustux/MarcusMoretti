<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ikarus">
    <meta name="generator" content="Ikarus">
    <title>IKARUS Corp</title>

    <link href="bootstrap533dist/css/bootrastrap4.min.css" rel="stylesheet">
 
    <link href="bootstrap533dist/css/sticky-footer-navbar.css" rel="stylesheet">

    
    <link href="main.css" rel="stylesheet">

    <style type="text/css">
      body {
          background-color: #000000;
      }
    </style>
    <style>
.collapsible {
  background-color: #ffffff;
  color:#000000;
  cursor: pointer;
  padding: 13px; 
  border:none;
  width: 100%; 
  text-align: left;
  outline: none;
  font-size: 15px;
}

.collapsibleconbrode
{
  background-color: #ffffff;
  color:#000000;
  cursor: pointer;
  padding: 13px;
  border:none;
 /* padding-top: 10px;
  padding-right: 97%;
  padding-bottom: 10px;
  padding-left: 1%;*/
  width: 97%;
  border-width: 2px;
  border-style: solid;
  border-color: black;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.collapsiblenaranja
{
  background-color: #ee7025;
  color:#ffffff;
  cursor: pointer;
  padding: 10 px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 18px;
}

.active, .collapsible:hover {
  background-color: #ffffff;
  color:#000000;
}

.collapsible:after {
  content: '\002B';
  color: black;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}




.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
</style>

  </head>

  <body>
    <!-- Begin menu -->
    <div class="fondonegromenu">
    <?php
     global $idmenu;
     $idmenu=2;
     include_once 'menu.php';
    ?>
    </div>
   
<!-- end menu -->
    <!-- Begin page content -->
    <main role="main" class=" ">



    <a name="home"></a> 
  
        <div class=" ">
         
                <div class="  fondoservicios">
                <br><br> <br><br>
                <div class="row justify-content-center">
              
                   <div class="row justify-content-center">
                       <div class="col-8 row justify-content-center">
                          <br>
                          <button class="collapsiblenaranja"><b>RF Services</b> </button>
                              <button class="collapsible"><span class=' '><b> Installation services </b> </span></button>
                              <div class="content">

                              <br>
                              <div class="row">
                              <div class="col">
                              Our RF installation services involve setting up RF equipment, including antennas and transmitters, ensuring proper alignment, configuration, and integration with existing systems, followed by testing for optimal signal strength and performance. 
                             
                              </div>
                              <div class="col">
                                <img src="imagenes/imgrf1.jpg" width="100%">
                              </div>
                            </div>
                                  <br>
                              </div>
                              <button class="collapsible"><b> Preventive Maintenance </b></button>
                              <div class="content"><br>

                              <div class="row">
                                <div class="col">
                                Our RF Preventive maintenance service involves regular inspections, cleaning, calibration, functionality testing, and parts replacement to ensure optimal performance and reliability, reducing downtime and extending equipment lifespan 
                               
                                </div>
                                <div class="col">
                                <img src="imagenes/imgrf2.jpg" width="100%">
                                </div>
                              </div>
                                        <br>
                              </div>
                              <button class="collapsible"> <b>Repair</b> </button>
                              <div class="content">
                                <br>

                                <div class="row">
                                  <div class="col">
                                  Ikarus is your partner for multi-vendor network equipment repair, our service includes diagnosing faults, replacing damaged components, recalibrating settings, and testing functionality to restore optimal performance and ensure reliable operation. <br>
                                  With Ikarus' comprehensive repair services, you can significantly reduce costs by consolidating multiple product repairs into a single RMA, regardless of technology or product line. Our expertise extends to legacy and discontinued equipment, ensuring uninterrupted network operations even for unsupported systems. <br>
                                  <br><ul>
                                  <li>	Certified Engineers</li>
                                  <li>	Online Repair Portal</li>
                                  <li>	Test and Redeployment-Clean and Screen</li>
                                  <li>	On-site repair</li>
                                  <li>	Advanced Exchange</li>
                                  <li>	We repair RAN, In-Building/DAS, Power, Microwave, Optical, IP and more</li>
                                  </ul>
                                  <br>
                                  </div>
                                  <div class="col">
                                  <img src="imagenes/imgrf3.jpg" width="100%">
                                  </div>
                                </div>

                             
                              </div>

                              <p> <br><br> <br><br> <br><br> <br><br></p>

                       </div>
                    </div>
                </div>
                <br><br> <br><br>
                </div>
        
 

        </div>
  
 
    </main>
    
 
 
  <?php   include_once 'footer.php'; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="bootstrap533dist/js/popper4.min.js"></script>
    <script src="bootstrap533dist/js/bootstrap4.min.js"></script>

    <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

  </body>
</html>

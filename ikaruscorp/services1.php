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
                          <button class="collapsiblenaranja"><b>Ikarus Automation Services </b> </button>
                          <div class="container fondoblanco row">
                            <div class="col">
                              <br>
                            Automation of production documentation management, calibration, test and measurement processes for electronic equipment and assemblies in general.
                            <br> <br> Our solutions are designed to optimize accuracy and repeatability in test environments, ensuring compliance with the required technical standards. 
                            <br><br>
The automated system <b>reduces manual intervention, improves operational efficiency and ensures consistent results in every process</b>, with the ability to handle different technologies and product types.
<br> <br> We focus on improving data integrity and traceability of measurements, minimizing the margin of error and optimizing cycle times. 
<br>  <br>
                            </div>
                            <div class="col">
                            <img src="imagenes/servicioswebfas.png" width="100%">
                            </div>
                          </div>
                          <div>
                      </div>    

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

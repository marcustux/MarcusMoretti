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
                          <button class="collapsiblenaranja"><b>Software Factory  </b> </button>
                          <div class="container fondoblanco row">
                          <p>
                              <br>
                              We are dedicated to the development and maintenance of software, according to specific requirements predefined by our clients and based on four basic principles: agility, automation, information analytics and security.  
                              <br><br>We Develop and maintain systems on windows, Linux platforms with php, java, java script, html, Payton and Zabbix languages. 

                              <br>  <br>
                          </p>

                              <div class=" row justify-content-center">
                              
                              <div class="container row justify-content-center">

                                <div class="col-1">
                                    <img src="iconos/iconoservicea1.png" width="50px">
                                </div>
                                <div class="col-4">
                                <b> Digital Process Automation (DPA)</b>
                                <br><br>
A DPA platform is an excellent tool for establishing end-to-end process automation across your organization. It promotes better collaboration between business and IT departments.

                                </div>
                                <div class="col-1">
                                    <img src="iconos/iconoservicea2.png" width="50px">
                                </div>
                                <div class="col-4">
                                <b> Software Maintenance </b> <br><br>
Our clients' solutions require ongoing improvements and updates to ensure they remain functional and effective. Many CIOs view application maintenance as crucial for maintaining the stability, functionality, and durability of their core applications.

                                </div>
                              </div>
                              </div>
                              <br><br>
                              <div class=" row justify-content-center">

                              <div class="container row justify-content-center">
                              <div class="col-1">
                                    <img src="iconos/iconoservicea3.png" width="50px">
                                </div>
                                <div class="col-4">
                                <b>Help Desk</b>
                                <br><br>
                                We specialize in managing problems within your IT processes. We offer support to users by addressing technical issues, answering questions, and providing solutions for software, hardware, or service-related problems.
                                </div>
                                <div class="col-1">
                                    <img src="iconos/iconoservicea4.png" width="50px">
                                </div>
                                <div class="col-4">
                                <b> IT Services  </b><br><br>
                                We manage the complexities of IT, ensuring your critical systems remain operational and your team productive. Our IT solutions provide responsive customer service, proactive support, and up-to-date tools for reliable day-to-day network management. Our team includes professional help desk staff, field engineers, and technical project specialists.
                                </div>
                              </div>

                              </div>
                              
                              <br>  
                              <p><br> <br> <br> </p>
                              <br>  <br>
                            </div>
                             
                          </div>
                          <div>
                      </div>    

                       </div>
                    </div>
                </div>
          
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

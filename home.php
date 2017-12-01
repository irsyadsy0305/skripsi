<?php
include('session.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
          </li>
        
          
          <li class="">
                        <a  href="home.php" ><i class="fa fa-dashboard fa-3x"></i> home</a>
                    </li>

                    <li>
                        <a  href="profile.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      <li>
                        <a  href="page=pencarian"><i class="fa fa-desktop fa-3x"></i> pencarian </a>
                    </li>
                   
                             
                   
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                  <h1 align="center">masukan data </h1>
    <form class="form-horizontal" action="input.php"  name="input-data" method="post" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">mrek laptop</label>
    <div class="col-sm-10">

      <input type="text" name="MREK" required="required" class="form-control" />

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">service center </label>
    <div class="col-sm-10">

      <input type="text" name="SERVICE_CENTER" required="required" class="form-control" />

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"> nama pelangan  </label>
    <div class="col-sm-10">

      <input type="text" name="PELANGGAN" required="required" class="form-control" />


    </div>
  </div>

  

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">no hp</label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="TELPHONE" placeholder="no hp">

    </div>
  </div>

<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">email</label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="EMAIL_ID" placeholder="email">

    </div>
  </div>

<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">tgl_masuk</label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="TGL_MASUK" >

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">tipe mesin </label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="MACHINE_TYPE" >

    </div>
  </div>

<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Serial number </label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="SERIAL_NUMBERE" >

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">service tipe </label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="SERVICE_TYPE" >

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">kerusakan </label>
    <div class="col-sm-10">
     <textarea class="form-control" rows="3" name=""  id="kerusakan"></textarea>
    </div>
  </div>

<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">tindakan  </label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="TINDAKAN" >

    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">tgl keluar   </label>
    <div class="col-sm-10">

    <input type="text" class="form-control" name="TGL_KELUAR" >

    </div>
  </div>





  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enter</button>
    </div>
  </div>
</form>




                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
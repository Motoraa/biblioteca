<?php
include "conectare.php";
session_start();
error_reporting(0); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Biblioteca</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome2.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php include('includes/header.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ELEV DASHBOARD</h4>
                
            </div>

        </div>
             
             <div class="row">



            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
							
<?php 
$cnp=$_SESSION['cnp'];
$result = mysqli_query($conn, "SELECT * FROM imprumuturi WHERE cnp='$cnp'");
$nr=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($nr);?> </h3>
                             Total cărți împrumutate </a>
                        </div>
                    </div>
             
			 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
<?php 
$a=1;
$cnp=$_SESSION['cnp'];
$result = mysqli_query($conn, "SELECT * FROM imprumuturi WHERE cnp='$cnp' and Status='$a' ");
$nr1=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($nr1);?></h3>
                          
							<a href="cartiimprumutate.php" style="color:#996633">Cărți împrumutate nereturnate </a>
                        </div>
                    </div>
			 
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
<?php 
$a=0;
$cnp=$_SESSION['cnp'];
$result = mysqli_query($conn, "SELECT * FROM imprumuturi WHERE cnp='$cnp' and Status='$a' ");
$nr1=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($nr1);?></h3>
                          Cărți returnate
                        </div>
                    </div>
					
					
					<div class="col-md-3 col-sm-3 rscol-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
<?php 
$a=1;
$v=date('Y-m-d-h-i-s');
$cnp=$_SESSION['cnp'];
$result = mysqli_query($conn, "SELECT * FROM imprumuturi WHERE cnp='$cnp' and Status='$a' and (DATEDIFF('$v', Data_imprumutului)>'90') ");
$nr1=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($nr1);?> </h3>
                           <a href="restante.php" style="color:red">Cărți restante </a>
                        </div>
                    </div>
        </div>
    </div>
    </div>
<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>	
</body>
</html>
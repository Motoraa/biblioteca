<?php
include "conectare.php";
session_start();
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Biblioteca Online</title>
 
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php include('includes/header.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
<?php 
$result = mysqli_query($conn, "SELECT * FROM biblioteca");
$row=mysqli_fetch_array($result);
$nr=mysqli_num_rows($result);
?>


                            <h3><?php echo htmlentities($nr);?></h3>
                      Numarul cartilor din biblioteca
                        </div>
                    </div>


<div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php 
$result = mysqli_query($conn, "SELECT * FROM elevi");
$row=mysqli_fetch_array($result);
$nr3=mysqli_num_rows($result);
?>
                            <h3><?php echo htmlentities($nr3);?></h3>
                           Elevi înregistrati
                       </div>
                    </div>
            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
<?php 
$result = mysqli_query($conn, "SELECT * FROM imprumuturi");
$row=mysqli_fetch_array($result);
$nr1=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($nr1);?> </h3>
                           Total carti împrumutate
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
<?php 
$status=0;
$result = mysqli_query($conn, "SELECT * FROM imprumuturi where $status=Status");
$row=mysqli_fetch_array($result);
$nr2=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($nr2);?></h3>
                          Total carti returnate
                        </div>
                    </div>
               

        </div>
		
		<div class="row">

				<div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
						<?php 
						$a=1;
						$v=date('Y-m-d-h-i-s');
						$result = mysqli_query($conn, "SELECT * FROM imprumuturi WHERE Status='$a' and (DATEDIFF('$v', Data_imprumutului)>'90')");
						$row=mysqli_fetch_array($result);
						$nr4=mysqli_num_rows($result);
						?>


                            <h3><?php echo htmlentities($nr4);?></h3>    
					  <a href="cartirestante.php" style="color:red">Total carti restante</a>
                        </div>
                  </div>
				  
				  
				  <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
						<?php 
						$result = mysqli_query($conn, "SELECT * FROM admin");
						$row=mysqli_fetch_array($result);
						$nr4=mysqli_num_rows($result);
						?>


                            <h3><?php echo htmlentities($nr4);?></h3>
                      Admini înregistrati
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
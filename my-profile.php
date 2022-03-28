<?php
include "conectare.php";
session_start();
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Biblioteca</title>
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
                <h4 class="header-line">Profilul meu</h4>
            </div>
        </div>
		
        <div class="row">
			<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Profilul meu
                        </div>
                        <div class="panel-body">
                              <form name="signup" method="post">
							  
							  <?php 
										$cnp=$_SESSION['cnp'];
										$result = mysqli_query($conn, "SELECT * from  elevi  where cnp='$cnp' ");
										$row=mysqli_fetch_array($result);
										$nr=mysqli_num_rows($result);
										
										if($nr> 0)
										{
										               ?>  
										<div class="form-group">
										<label>Student ID : </label>
										<?php echo htmlentities($row['id']);?>
										</div>

										<div class="form-group">
										<label>Numele si prenumele : </label>
										<?php echo htmlentities($row['NumePrenume']);?>
										</div>
									
										<div class="form-group">
										<label>Clasa : </label>
										<?php echo htmlentities($row['Clasa']);?>
										</div>
										
										<div class="form-group">
										<label>Profilul : </label>
										<?php echo htmlentities($row['Profilul']);?>
										</div>
										

										<div class="form-group">
										<label>Numar de telefon:</label>
										<input class="form-control" type="text" name="cnp" id="cnp" value="<?php echo htmlentities($row['Nr_telefon']);?>"  autocomplete="off" required readonly />
										</div>
										


										<div class="form-group">
										<label>Email:</label>
										<input class="form-control" type="text" name="cnp" id="cnp" value="<?php echo htmlentities($row['Email']);?>"  autocomplete="off" required readonly />
										</div>
										
																				
										<div class="form-group">
										<label>CNP:</label>
										<input class="form-control" type="text" name="cnp" id="cnp" value="<?php echo htmlentities($row['cnp']);?>"  autocomplete="off" required readonly />
										</div>
										<?php } ?>

							  </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
   </div>
<?php include('includes/footer.php');?>
</body>
</html>
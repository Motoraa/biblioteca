<?php
include "conectare.php";
session_start();
if(isset($_POST['add']))
{
$cnp=$_POST['cnp'];
$NumePrenume=$_POST['NumePrenume'];
$Nrtelefon=$_POST['Nr_telefon'];
$Clasa=$_POST['Clasa'];
$Profilul=$_POST['Profilul'];
$Email=$_POST['Email'];
$insert = mysqli_query($conn,"INSERT INTO `elevi` (`cnp`,`NumePrenume`, `Nr_telefon`,`Clasa`,`Profilul`,`Email`) VALUES 
('$cnp','$NumePrenume','$Nrtelefon','$Clasa','$Profilul','$Email')");

if($insert)
{
$_SESSION['msg']="Elevul a fost adaugata cu succes";
header('location:elevi.php');
}
else 
{
$_SESSION['error']="A aparaut o eroare. Incearca din nou.";
header('location:elevi.php');
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="Autor" content="" />
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
                <h4 class="header-line">Adaugare elevi</h4>
                
                            </div>

	</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<div class="panel panel-info">
					<div class="panel-heading">
					Informatii elev
					</div>
					<div class="panel-body">
					<form role="form" method="post">
					<div class="form-group">
					<label>CNP<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="cnp" autocomplete="off"  required />
					</div>
					
					<div class="form-group">
					<label>Numele si prenumele<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="NumePrenume" autocomplete="off"  required />
					</div>
					
					<div class="form-group">
					<label>Numarul de telefon<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Nr_telefon" autocomplete="off"  required />
					</div>


					 <div class="form-group">
					 <label>Clasa<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Clasa" autocomplete="off"   required="required" />
					 </div>
				

					<div class="form-group">
					 <label>Profilul<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Profilul" autocomplete="off"   required="required" />
					 </div>
					
					
					
					<div class="form-group">
					 <label>Email<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Email" autocomplete="off"   required="required" />
					 </div>
					<button type="submit" name="add" class="btn btn-info">Adaugare </button>
					
					</form>
												</div>
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
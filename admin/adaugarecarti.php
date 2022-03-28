<?php
include "conectare.php";
session_start();
if(isset($_POST['add']))
{
$Titlu=$_POST['Titlu'];
$Autor=$_POST['Autor'];
$Editura=$_POST['Editura'];
$Stoc=$_POST['Stoc'];
$insert = mysqli_query($conn,"INSERT INTO `biblioteca` (`Titlu`,`Autor`, `Editura`,`Stoc`) VALUES ('$Titlu','$Autor','$Editura','$Stoc')");

if($insert)
{
$_SESSION['msg']="Cartea a fost adaugata cu succes";
header('location:carti.php');
}
else 
{
$_SESSION['error']="A aparaut o eroare. Incearca din nou.";
header('location:carti.php');
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
                <h4 class="header-line">Adaugare carti</h4>
                
                            </div>

	</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<div class="panel panel-info">
					<div class="panel-heading">
					Informatii carte
					</div>
					<div class="panel-body">
					<form role="form" method="post">
					<div class="form-group">
					<label>Numele cartii<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Titlu" autocomplete="off"  required />
					</div>
					
					<div class="form-group">
					<label>Autorul<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Autor" autocomplete="off"  required />
					</div>
					
					<div class="form-group">
					<label>Editura<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Editura" autocomplete="off"  required />
					</div>


					 <div class="form-group">
					 <label>Stoc<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Stoc" autocomplete="off"   required="required" />
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
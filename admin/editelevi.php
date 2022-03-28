<?php
include "conectare.php";
session_start();
if(isset($_POST['update']))
{
$cnp=$_POST['cnp'];
$NumePrenume=$_POST['NumePrenume'];
$Nrtelefon=$_POST['Nr_telefon'];
$Clasa=$_POST['Clasa'];
$Profilul=$_POST['Profilul'];
$Email=$_POST['Email'];
$ID=$_GET['iddd'];
$insert = mysqli_query($conn,"update  elevi set cnp='$cnp',NumePrenume='$NumePrenume',Nr_telefon='$Nrtelefon',
Clasa='$Clasa',Profilul='$Profilul',Email='$Email' where id='$ID'");
if($insert)
{
$_SESSION['msg']="Elevul a fost updatat cu succes!!";
header('location:elevi.php');
}
else $_SESSION['error']="A aparut o eroare. Incearca mai tarziu";;
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
					
<?php 					
		$id_elev=$_GET['iddd'];
		$result = mysqli_query($conn, "SELECT * FROM elevi where id='$id_elev'");
		$row=mysqli_fetch_array($result);
		$nrrr=mysqli_num_rows($result);

	if($nrrr > 0)
{
?>
					<div class="form-group">
					<label>CNP<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="cnp" autocomplete="off"  value="<?php echo htmlentities($row['cnp']);?>" />
					</div>
					
					<div class="form-group">
					<label>Numele si prenumele<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="NumePrenume" autocomplete="off"  value="<?php echo htmlentities($row['NumePrenume']);?>" />
					</div>
					
					<div class="form-group">
					<label>Nr.telefon<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Nr_telefon" autocomplete="off"  value="<?php echo htmlentities($row['Nr_telefon']);?>" />
					</div>


					 <div class="form-group">
					 <label>Clasa<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Clasa" autocomplete="off"   value="<?php echo htmlentities($row['Clasa']);?>" />
					 </div>
					 
					 <div class="form-group">
					 <label>Profilul<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Profilul" autocomplete="off"   value="<?php echo htmlentities($row['Profilul']);?>" />
					 </div>
					 
					 <div class="form-group">
					 <label>Email<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Email" autocomplete="off"   value="<?php echo htmlentities($row['Email']);?>" />
					 </div>
					 
					 
					<button type="submit" name="update" class="btn btn-info">Update </button>

					</form>
<?php } ?>
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
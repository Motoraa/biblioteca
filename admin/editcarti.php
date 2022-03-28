<?php
include "conectare.php";
session_start();

if(isset($_POST['update']))
{
$Titlu=$_POST['Titlu'];
$Autor=$_POST['Autor'];
$Editura=$_POST['Editura'];
$Stoc=$_POST['Stoc'];
$ID=$_GET['iddd'];
$insert = mysqli_query($conn,"update  biblioteca set Titlu='$Titlu',Autor='$Autor',Editura='$Editura',Stoc='$Stoc' where Nr='$ID'");
$_SESSION['msg']="Cartea a fost updatata cu succes!!";
header('location:carti.php');
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
		$id_carte=$_GET['iddd'];
		$result = mysqli_query($conn, "SELECT * FROM biblioteca where Nr='$id_carte'");
		$row=mysqli_fetch_array($result);
		$nrrr=mysqli_num_rows($result);

	if($nrrr > 0)
{
?>
					<div class="form-group">
					<label>Numele cartii<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Titlu" autocomplete="off"  value="<?php echo htmlentities($row['Titlu']);?>" />
					</div>
					
					<div class="form-group">
					<label>Autorul<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Autor" autocomplete="off"  value="<?php echo htmlentities($row['Autor']);?>" />
					</div>
					
					<div class="form-group">
					<label>Editura<span style="color:red;">*</span></label>
					<input class="form-control" type="text" name="Editura" autocomplete="off"  value="<?php echo htmlentities($row['Editura']);?>" />
					</div>


					 <div class="form-group">
					 <label>Stoc<span style="color:red;">*</span></label>
					 <input class="form-control" type="text" name="Stoc" autocomplete="off"   value="<?php echo htmlentities($row['Stoc']);?>" />
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
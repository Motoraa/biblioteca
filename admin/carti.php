<?php
include "conectare.php";
session_start();
error_reporting(0);
if(isset($_GET['del']))
{
$id=$_GET['del'];
$insert = mysqli_query($conn,"delete from biblioteca  WHERE nr='$id'");

if($insert)
{
$_SESSION['msg']="Cartea a fost stearsa cu succes";
header('location:carti.php');
}
else 
{
$_SESSION['error']="A aparaut o eroare. Incearca din nou.";
header('location:carti.php');
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Bibliotdca online</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>
<body>
<?php include('includes/header.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Administreaza cartile</h4>
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Carti
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                                 <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Titlu</th>
                                            <th>Autor</th>
                                            <th>Editura</th>
                                            <th>Stoc</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result = mysqli_query($conn, "SELECT * FROM biblioteca");
$row=mysqli_fetch_array($result);
$nrc=mysqli_num_rows($result);

if($nrc > 0)
{
  foreach($result as $rows)
{           ?>                                      
                                        <tr class="header">
                                            <td class="center"><?php echo htmlentities($rows['Nr']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Titlu']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Autor']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Editura']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Stoc']);?></td>
                                            <td class="center">

                                            <a href="editcarti.php?iddd=<?php echo htmlentities($rows['Nr']);
											$_SESSION['id']=$rows['Nr'];
											?>">
											<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
											<a href="carti.php?del=<?php echo htmlentities($rows['Nr']) ;?>" onclick="return confirm('Esti sigur ca vrei sa stergi aceasta carte?');">  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
<?php }} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
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
	<script src="assets/js/tabel/tabel1.js"> </script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"> </script>
	<script> $(document).ready(function() {
    $('#myTable').DataTable( {
        "lengthMenu": [10] //cate valori se afiseaza pe pagina.
    } );
} );
</script>
</body>
</html>
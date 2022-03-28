<?php
include "conectare.php";
session_start();
error_reporting(0);
if(isset($_GET['del']))
{
$id=$_GET['del'];
$id_carte=$_SESSION['id_carte'];
$data11=date('Y-m-d');
$insert = mysqli_query($conn,"update imprumuturi set Status='0'  WHERE Nr='$id'");
$result = mysqli_query($conn,"select biblioteca.Stoc as Stoc, biblioteca.Nr, 
imprumuturi.id_carte,imprumuturi.Nr from biblioteca INNER JOIN imprumuturi ON imprumuturi.id_carte=biblioteca.Nr and imprumuturi.Nr='$id'");
$row=mysqli_fetch_array($result);
$stoc1=$row['Stoc'];
$stoc=$stoc1+1;
$id1=mysqli_fetch_array($result);
$insert2 = mysqli_query($conn,"update biblioteca set Stoc='$stoc' where '$id_carte'=Nr");

		

if($insert)
{
$insert1 = mysqli_query($conn,"update imprumuturi set Data_returnarii='$data11' WHERE Nr='$id'");
$_SESSION['msg']="Cartea a fost stearsa cu succes";
header('location:imprumuturi.php');
}
else 
{
$_SESSION['error']="A aparaut o eroare. Incearca din nou.";
header('location:imprumuturi.php');
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Bibliotdca online</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome12.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>
<body>
<?php include('includes/header.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Imprumuturi</h4>
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
                           Imprumuturi active
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nume si prenume</th>
                                            <th>Titlu</th>
                                            <th>Autor</th>
                                            <th>Editura</th>
                                            <th>Data imprumutului</th>
                                            <th>Cod imprumut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result = mysqli_query($conn, "SELECT elevi.NumePrenume,imprumuturi.Nr,imprumuturi.cnp FROM elevi INNER JOIN imprumuturi ON elevi.cnp = imprumuturi.cnp and imprumuturi.Status='1'");
$nrc=mysqli_num_rows($result);
$result1=mysqli_query($conn, "SELECT biblioteca.Titlu,biblioteca.Autor,biblioteca.Editura,imprumuturi.id_carte,imprumuturi.Data_imprumutului,imprumuturi.cod_imprumut FROM biblioteca INNER JOIN imprumuturi ON biblioteca.Nr = imprumuturi.id_carte and imprumuturi.Status='1' ");
$nrc1=mysqli_num_rows($result1);

if($nrc > 0 and $nrc1>0 )
{
	
	while($linie=mysqli_fetch_array($result) )
	{
		$linie1=mysqli_fetch_array($result1);
		echo "<tr>";
		echo "<td>";
		echo $linie ['Nr'];
		echo "</td>";
		echo "<td>";
		echo $linie ['NumePrenume'];
		echo "</td>";
		echo "<td>";
		echo $linie1 ['Titlu'];
		echo "</td>";
		echo "<td>";
		echo $linie1 ['Autor'];
		echo "</td>";
		echo "<td>";
		echo $linie1 ['Editura'];
		echo "</td>";
		echo "<td>";
		echo $linie1 ['Data_imprumutului'];
		echo "</td>";
		echo "<td>";
		echo $linie1 ['cod_imprumut'];
		echo "</td>";
		echo "<td>";
		$_SESSION['id_carte']=$linie1['id_carte'];
		?>
		<a href="imprumuturi.php?del=<?php echo htmlentities($linie['Nr']) ;?>" onclick="return confirm('Esti sigur ca vrei sa stergi aceasta carte?');">  
		<button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
		<?php
		echo "</td>";
		
		echo "</tr>";
          ?>                                      
  
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
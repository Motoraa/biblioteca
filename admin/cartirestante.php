<?php
include "conectare.php";
session_start();
error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Bibliotdca online</title>
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
                <h4 class="header-line">Imprumuturi restante</h4>
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
                           Carti restante
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<input type="text" id="myInput" placeholder="Cautati o carte" />
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id. Carte</th>
                                            <th>Nume si prenume</th>
                                            <th>Titlu</th>
                                            <th>Autor</th>
                                            <th>Editura</th>
                                            <th>Data imprumutului</th>
                                            <th>Cod imprumut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$v1=date('Y-m-d');
$cnp=$_SESSION['cnp'];
$result = mysqli_query($conn, "SELECT elevi.NumePrenume,imprumuturi.Nr,imprumuturi.cnp FROM elevi INNER JOIN imprumuturi ON elevi.cnp = imprumuturi.cnp and imprumuturi.Status='1' and (DATEDIFF('$v1', imprumuturi.Data_imprumutului)>'90')");
$nrc=mysqli_num_rows($result);
$result1=mysqli_query($conn, "SELECT biblioteca.Nr,biblioteca.Titlu,biblioteca.Autor,biblioteca.Editura,imprumuturi.id_carte,imprumuturi.Data_imprumutului,imprumuturi.cod_imprumut FROM biblioteca 
INNER JOIN imprumuturi ON biblioteca.Nr = imprumuturi.id_carte and imprumuturi.Status='1' and (DATEDIFF('$v1', imprumuturi.Data_imprumutului)>'90') ");
$nrc1=mysqli_num_rows($result1);
	
if($nrc > 0 and $nrc1>0 )
{
	$nr=0;
	while($linie1=mysqli_fetch_array($result1) )
	{
		$nr=$nr+1;
		$linie=mysqli_fetch_array($result);
		echo "<tr>";
		echo "<td>";
		echo $nr;
		echo ".";
		echo "</td>";
		echo "<td>";
		echo $linie1 ['Nr'];
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
		
		echo "</tr>";
          ?>                                      
  
<?php }} ?>                                      
                                    </tbody>
                                </table>
<script>
function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var c1 = rows[i].cells[0].textContent.toUpperCase();
        var c2 = rows[i].cells[1].textContent.toUpperCase();
        var c3 = rows[i].cells[2].textContent.toUpperCase();
        var c4 = rows[i].cells[3].textContent.toUpperCase();
        var c5 = rows[i].cells[4].textContent.toUpperCase();
        var c6 = rows[i].cells[5].textContent.toUpperCase();
        if (c1.indexOf(filter) > -1 || c2.indexOf(filter) > -1|| c3.indexOf(filter) > -1
		|| c4.indexOf(filter) > -1|| c5.indexOf(filter) > -1 || c6.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>
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
</body>
</html>
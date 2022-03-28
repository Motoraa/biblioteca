<?php
include "conectare.php";
session_start();
error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Biblioteca</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>
<body>
<?php include('includes/header.php');?>

<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">CĂRȚILE DIN BIBLIOTECĂ</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Alege-ti cartea bifand casuta din dreapta tabelului
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<form method="post" action="succesimprumut.php">
                               <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
											<th>Titlu</th>
											<th>Autor</th>
											<th>Editura</th>
											<th>Stoc</th>
											<th>Actiunea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$q=mysqli_query($conn,"select * from biblioteca ");
$nrc1=mysqli_num_rows($q);
$rows=mysqli_fetch_array($q);
if($nrc1>0)
{
	$nr=0;
  foreach($q as $rows)
{         ?>                                      
                                        <tr class="header">
                                            <td class="center"><?php echo htmlentities(++$nr); echo".";?> </td>                         
                                            <td class="center"><?php echo htmlentities($rows['Titlu']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Autor']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Editura']);?></td>
											<td class="center"><?php echo htmlentities($rows['Stoc']);?></td>
											<td class="center">
											<?php $a=$rows['Nr']; 
											echo "<input type='radio' name='hob[]' id='hob[]' value='$a'/>"; ?>

                                        </tr>
<?php }} else echo "Cartea nu este in stoc"; ?>   
              
                                    </tbody>
                                </table>
                            </div>
							<center>

									  <input type="submit" name="submit1" value="Împrumută cartea" id="submit1">
									</form> <br> <br>
                            <?php
									echo "<a href=search1.php>Inapoi</a>";
									?>
									</center>
									
									
							
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
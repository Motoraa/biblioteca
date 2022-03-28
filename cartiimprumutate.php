<?php
include "conectare.php";
session_start();
//if(strlen($_SESSION['login'])==0)
  //{ 
 // header('location:index.php');}
//else{ 
error_reporting(0);
?>
<!DOCTYPE html>
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
                <h4 class="header-line">Carti imprumutate</h4>
		</div>
     


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Carti imprumutate
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<input type="text" id="myInput" placeholder="Cautati o carte" />
								
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
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
$result1=mysqli_query($conn, "SELECT biblioteca.Nr,biblioteca.Titlu,biblioteca.Autor,biblioteca.Editura,imprumuturi.id_carte,imprumuturi.Data_imprumutului,imprumuturi.cod_imprumut FROM biblioteca 
INNER JOIN imprumuturi ON biblioteca.Nr = imprumuturi.id_carte and imprumuturi.Status='1' and '$cnp'=imprumuturi.cnp ");
$nrc1=mysqli_num_rows($result1);
$nr=0;
if($nrc1>0)
{
	 foreach($result1 as $rows)
{           $nr=$nr+1;
			$nr1='.';
				?>                                      
                                        <tr class="header">
										
                                            <td class="center"><?php echo htmlentities($nr.$nr1) ;?></td>                       
                                            <td class="center"><?php echo htmlentities($rows['Titlu']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Autor']);?></td>
                                            <td class="center"><?php echo htmlentities($rows['Editura']);?></td>
											<td class="center"><?php echo htmlentities($rows['Data_imprumutului']);?></td>
											<td class="center"><?php echo htmlentities($rows['cod_imprumut']);?></td>
                                          

                                        </tr>
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
                    <!--End Advanced Tables -->
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

<?php
include "conectare.php";
session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

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
                <h4 class="header-line">CĂRȚILE DIN BIBLIOTECA</h4>
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
                                            <th>Nr</th>
											<th>Titlu</th>
											<th>Autor</th>
											<th>Stoc</th>
											<th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
include "conectare.php";
if(isset($_POST['submit']))
{
	$Titlu = $_POST['Titlu'];
    $Autor= $_POST['Autor'];
	$q=mysqli_query($conn,"select Nr,Autor,Titlu,stoc from biblioteca where Titlu='$Titlu' or Autor='$Autor'") or die ("interogare esuata");
if(mysqli_num_rows($q)>0)
{
	while($linie=mysqli_fetch_array($q))
	{
		echo "<tr>";
		echo "<td>";
		echo $linie ['Nr'];
		$a=$linie ['Nr'];
		echo "</td>";
		echo "<td>";
		echo $linie ['Titlu'];
		echo "</td>";
		echo "<td>";
		echo $linie ['Autor'];
		echo "</td>";
		echo "<td>";
		echo $linie ['stoc'];
		echo "</td>";
		echo "<td><input type='radio' name='hob[]' id='hob[]' value='$a'/>";
		echo "</tr>";
		echo "<br>";
	}

}
else
echo "Cartea nu este in stoc";
}
?>                 
                                    </tbody>
                                </table>
                            </div>
							<center>

									  <input type="submit" name="submit1" value="Imprumuta cartea" id="submit1">
									</form> <br> <br>
                            <?php
									echo "<a href=search1.php>Cauta o alta carte</a>";
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
</body>
</html>
<?php
include "conectare.php";
session_start();
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
						<h4 class="header-line">Împrumuturi</h4>
                
				
			<?php
									if(isset($_POST['submit1']))
									{		
										$chkbox=$_POST['hob'];
										$chk="";
										$cnp=$_SESSION['cnp'];
										$a=(int)$cnp%10000;      // salvez ultimele 4 cifre din cnp pentru cod_imprumut
										date_default_timezone_set("Europe/Bucharest");
										$k=date('Y-m-d');
										$verificare_restante=mysqli_query($conn,"select * FROM imprumuturi WHERE cnp='$cnp' and (DATEDIFF('$k', Data_imprumutului)>'90') and Status='1'");
										if(mysqli_num_rows($verificare_restante)>0)
										{
										echo "Ne pare rau dar nu poti imprumuta aceasta carte, deoarece ai una sau mai multe carti restante.";?> <br> <?php
										echo "Revino cu cele restante si iti poti lua ce doresti.";}
										else
										{
										$data = date('Y-m-d');
										$data1 = date('h-i-s');
										$a1=$a.date('his');
										foreach($chkbox as $chkboxresult)
										{
											$chk=$chkboxresult;
										}
										$sql=mysqli_query($conn,"select stoc FROM biblioteca WHERE nr='$chk'");
										$row=mysqli_fetch_array($sql);
										$stock=$row['stoc'];
										if($stock>0)
										{
											$nstock=$stock-1;
											$result1=mysqli_query($conn,"update biblioteca set Stoc='$nstock' where '$chk'=Nr");
											$result=mysqli_query($conn,"INSERT INTO `imprumuturi` (`id_carte`,`cnp`,`Data_imprumutului`,`Status`,`cod_imprumut`) VALUES ('$chk','$cnp','$data.$data1','1','$a1')");
											if($result==1)
											{
													echo "Cartea a fost imprumutata cu succes. Prezinta codul <strong> $a1 </strong> pentru a primi cartea. "; ?> <br>
													<?php
												echo "<a href=search1.php>Cauta o alta carte</a>";
											}
												else
													echo "Ceva nu a functionat bine. Incearca din nou!";
										} else
										{
											echo "Ne pare rau, dar nu mai sunt stocuri disponibile. Mai incearca in cateva zile"; ?> <br> 
											<?php
											echo "<a href=search1.php>Cauta o alta carte</a>";
										}
									}
									}
									?>
					</div>
				</div>
			<center>
			
		</div>
		</center>
	</div>
<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>	
</body>
</html>
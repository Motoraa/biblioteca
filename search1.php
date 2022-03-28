<?php
include "conectare.php";
session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
						<h4 class="header-line">Împrumuturi</h4>
                
					</div>
				</div>
			<center>
			<h3>Introdu titlul cărții sau autorul</h3>

			<form action="search.php" method="post"> 
					Titlu <input type="text" name="Titlu" placeholder="Introduceți titlul cărții" id="Titlu">
						<br/>
					Autor <input type="text" name="Autor" placeholder="Introduceți numele autorului" id="Autor">
						<br/>
						<br>
					<input type="submit" name="submit" value="Caută" id="submit"> <br> <br>
					<a href="toatecartile.php"> Vezi toate cărțile
			</form>

		</div>
		</center>
	</div>
<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>	
</body>
</html>
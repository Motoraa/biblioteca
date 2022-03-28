			<?php
			include "conectare.php";
			session_start();
			
			if(isset($_POST['login']))
			{
			$cnp = $_POST['cnp']; 
			$result = mysqli_query($conn, "SELECT * FROM elevi WHERE cnp='$cnp'");
			$row=mysqli_fetch_array($result);
			$nr=mysqli_num_rows($result);
			if($nr>0){	
				$_SESSION['cnp'] = $row['cnp'];
				$_SESSION['login']=$_POST['login'];					
				echo "<center>
						<div class='alert alert-success mt-4' role='alert'><strong>Bine ai venit!</strong> $row[NumePrenume]			
							<p><a href='dashboard.php'>Împrumută o carte</a></p>
							<p><a href='logout.php'>Log out</a></p>
						</div> 
					  </center>";	
			
			} else {
				echo "<center>
					<div class='alert alert-danger mt-4' role='alert'>Ai introdus un CNP greșit!
						<p><a href='index.php'><strong>Încearca din nou!</strong></a></p>
					</div>";			
			}	
			}
			?>
<html lang="en">
  <head>
    <title>Biblioteca</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
  </head>

  <body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">		
					<div class="card">
						<div class="loginBox">
							<img src="images/book.jpg" class="img-responsive" alt="PHP MySQL logos">
							<h2>Login</h2>

							<form action="index.php" method="post">                           							
								<div class="form-group">        
									<input type="text" class="form-control input-lg" name="cnp" placeholder="CNP-ul" id="cnp" required>       
								</div>								    
									<button type="submit" class="btn btn-success btn-block" name="login" >Login</button>
									<a href="admin/index.php">Logheaza-te ca admin 
							</form>																		
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>	
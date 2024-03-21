<?php 
ini_set('display_errors','1'); 
?>
<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/bootstrap-directional-buttons.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="css/style.css">



    <title>ÖDKS</title>
<style>
body {
  background-color: #F5DEB3;
}

 .btnekle{
        background: #4D4D4D;
		color : #FFFFFF;
		font-weight: bold;
    }
.btnekle:hover {
    color: #000000!important;
    background: #FFB71B!important;
	font-weight: bold!important!important;
	cursor: pointer!important;
	}	
</style>
</head>
  <body>
  <br>
	<div class="container"><br>
		<div class="row">	
			<div class="col">	</div>
			<div class="col-md-6 " style="background-color:#4D4D4D;">	<br>
	
			<center><img class="img-fluid img-thumbnail"  src="img/ybs.png" alt="logo bulunamadı" width="150" height="150" />  <br><br>
				<form action="login.php" method="POST">
				  <div class="form-group">
					<label for="k_ad" style="color:#FFB71B; font-weight: bold;">T.C.Kimlik No</label>
					<input type="text" class="form-control" id="k_ad" name="k_ad" aria-describedby="k_ad" placeholder="T.C. Kimlik No" autocomplete="off" maxlength="11">
				  </div><br>
				  <div class="form-group">
					<label for="k_sifre" style="color:#FFB71B; font-weight: bold;">Şifre</label>
					<input type="password" class="form-control" id="k_sifre" name="k_sifre" placeholder="Şifre" autocomplete="off" maxlength="6">
				  </div>
				  <br>
				  <center>
				  <button type="submit" class="btn btnekle btn-block" id="giris_yap" name="giris_yap">Sisteme Giriş</button>
				  </center>
				</form><br>
			</div>
			<div class="col">	</div>
		</div>
	</div>


	
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/jquery-3.5.1.js"></script>	
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap5.min.js"></script>	

  </body>
</html>


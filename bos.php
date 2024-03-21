<?php 
ini_set('display_errors','1'); 
include("baglan.php");

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

</style>
	
</head>
  <body onload="link()">
	<?php include("menu.php");?>
	<br>
	<div class="container">	

	</div>


	
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/jquery-3.5.1.js"></script>	
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap5.min.js"></script>	


 	<script>
		$(document).ready(function() {
			$('a[href="bos.php"').addClass('active');
		});
	</script> 
	<script>
		function link() {
		  $('a[href="bos.php"').addClass('active');
		}
	</script>
  </body>
</html>
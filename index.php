<?php 
session_start();
ini_set('display_errors','1'); 
include("baglan.php");

ob_start();
if(isset($_SESSION["ERDEM_GirisDurum"]) && $_SESSION["ERDEM_GirisDurum"] == "All_is_Well" && isset($_SESSION["ERDEM_KisiYetki"]) && $_SESSION["ERDEM_KisiYetki"] == "9")
{

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
	

    <title>DEÜ Öğrenci Devam Takip Kontrol</title>
<style>

body {
  background-color: #F5DEB3;
  .float-left {
    float: left;

	.float-right {
    float: right;
	
</style>
	
</head>
  <body onload="link()">
	<?php include("menu.php");?>
	<br>
	<div class="container">	
	<center>
	<div>
	</br></br>
	<img  src="img/ybs.png" alt="logo bulunamadı" width="200" height="200" /> <br><br><br>
	<h1>  ÖĞRENCİ DEVAM TAKİP KONTROL SİSTEMİ </h1> <hr/>
	
	<body>
  <div>
  <span style="font-wight: bolder; font-size:40px; color: red;" id="tarih-saat"></span>
  </div>
  <script>
    // Tarih ve saat bilgisini güncelleyen JavaScript kodu
    function tarihVeSaatiGuncelle() {
      var element = document.getElementById("tarih-saat");
      var tarihSaat = new Date();
      element.innerHTML = tarihSaat.toLocaleString();
    }

    // Her saniyede bir tarih ve saat bilgisini güncelle
    setInterval(tarihVeSaatiGuncelle, 1000);

	

  </script>
</body>

	<div>
	</center>
	</div>

	

	
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/jquery-3.5.1.js"></script>	
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap5.min.js"></script>	

	

	<script>
		$(document).ready(function() {
			$('a[href="index.php"').addClass('active');
		});
		
	</script> 
	<script>
		function link() {
		  $('a[href="index.php"').addClass('active');
		}

		
	</script>	
  </body>
</html>
<?php
}
else
{
session_destroy();
header("Location: giris.php");
}
?>
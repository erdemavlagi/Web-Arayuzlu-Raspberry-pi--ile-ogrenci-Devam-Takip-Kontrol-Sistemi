<?php 
ob_start();  
session_start();
ini_set('display_errors','1'); 
include("baglan.php");

$Mesaj = "";
if(isset($_POST['k_ad']) && strlen($_POST['k_ad']) == 11 && is_string($_POST['k_ad']))
{
	if(isset($_POST['k_sifre']) && strlen($_POST['k_sifre']) == 6 && is_string($_POST['k_sifre']))
	{		
		$Sql = "SELECT K.kisi_no,K.kisi_ad,K.kisi_soyad,KU.kullanici_tip,KU.kullanici_durum FROM kullanicilar KU, kisi K
				WHERE
				KU.kullanici_tc = K.kisi_no
				AND
				K.kisi_tip = 'P'
				AND
				KU.kullanici_durum = 'E' 
				AND 
				KU.kullanici_tc = '".$_POST['k_ad']."' 
				AND 
				KU.kullanici_sifre = '".$_POST['k_sifre']."'";
		$SorguSonucu = $db->query($Sql);
		$KayitSayisi = $SorguSonucu->num_rows;
		if($KayitSayisi > 0)
		{		
			while ($data = $SorguSonucu->fetch_assoc()) 
			{
				$_SESSION["ERDEM_KisiNo"] = $data['kisi_no'];
				$_SESSION["ERDEM_KisiAd"] = $data['kisi_ad'];
				$_SESSION["ERDEM_KisiSoyad"] = $data['kisi_soyad'];
				$_SESSION["ERDEM_KisiYetki"] = $data['kullanici_tip'];
				$_SESSION["ERDEM_GirisDurum"] = "All_is_Well";
				
				if($data['kullanici_tip'] == "1")
				{
					//sayfayı yönlendir
					header('Location: user/index.php');
				}
				//yönetici admin paneli
				elseif($data['kullanici_tip'] == "9")
				{
					//sayfayı yönlendir
					header('Location: index.php');
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Sisteme hatası !</div>";
				}
			}
		}
		else
		{
			$Mesaj = "<div class='alert alert-danger' role='alert'>Sisteme giriş yetkiniz bulunmamaktadır !</div>";
		}
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Şifre bilgisi !</div>";
	}		
}
else
{
	$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı T.C.Kimlik No bilgisi !</div>";
}
//echo $Mesaj;
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
</head>
  <body>
	<div class="container"><br><br>
		<div class="row">	
			<div class="col">	</div>
			<div class="col-6"><center><?php echo $Mesaj; ?></center></div>
			<div class="col">	</div>
		</div>
	</div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/jquery-3.5.1.js"></script>	
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap5.min.js"></script>	
	
	<script>	
	setTimeout(function(){ 
		window.location = "giris.php";				   
	}, 3000);			
	</script>
  </body>
</html>	
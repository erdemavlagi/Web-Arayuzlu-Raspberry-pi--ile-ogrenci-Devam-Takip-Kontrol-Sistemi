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


    <title>ÖDKS</title>
<style>
body {
  background-color: #F5DEB3;
}
.asd:hover {
    color: #FFFFFF!important;
    background-color: #FFB71B!important;
	font-weight: bold!important!important;
	cursor: pointer!important;
	}

 .backgroundPasif{
        background: #D90000;
		color : #FFFFFF;
    }
 .backgroundAktif{
        background: #009D03;
		color : #FFFFFF;
    }

	
    .page-item.active .page-link {
        color: #fff !important;
        background-color: #D90000 !important;
        border-color: #D90000 !important;
		font-weight: bold;
    }

    .page-link {
        color: #fff !important;
        background-color: #4D4D4D !important;
        border: 1px solid #4D4D4D !important;
font-weight: bold;		
    }

    .page-link:hover {
        color: #fff !important;
        background-color: #FFB71B !important;
        border-color: #FFB71B !important;
font-weight: bold;		
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
  <body onload="link()">
	<?php include("menu.php");?>
<div class="container"><br>
	<div class="row">
		<div class="col"></div>
			<div class="col-10">
				<table class="table table-hover" id="kullanicilar" cellpadding="0" cellspacing="0" border="0" style="background-color: #4D4D4D; color: #FFFFFF;border-collapse: collapse; border-spacing: 0; font-weight: bold;">
				  <thead>
					<tr style="background-color: #D90000; color: #FFFFFF;">
					  <th class="text-center" scope="col">Sıra</th>
					  <th class="text-center" scope="col">Resim</th>
					  <th class="text-center" scope="col">Kişi No</th>
					  <th class="text-center" scope="col">Ad</th>
					  <th class="text-center" scope="col">Soyad</th>
					  <th class="text-center" scope="col">Kullanıcı Durum</th>
					</tr>
				  </thead>	
				  <tbody>
					<?php
					$SiraNo = 0;
					$AktifKullanicilSayisi = 0;
					$PasifKullanicilSayisi = 0;
					$KisiSql = "SELECT K.kisi_no,K.kisi_ad,K.kisi_soyad,KU.kullanici_tip,KU.kullanici_durum FROM kullanicilar KU, kisi K
								WHERE
								KU.kullanici_tc = K.kisi_no
								AND
								K.kisi_tip = 'P'
								ORDER BY KU.kullanici_durum ASC, K.kisi_ad ASC";
					$SorguSonucu = $db->query($KisiSql); // Tablodaki tüm verileri çekiyoruz.
					if($SorguSonucu)							
					{
						while ($sonuc = $SorguSonucu->fetch_assoc()) 
						{
							$KisiNo = $sonuc['kisi_no'];	
							$KisiAd = $sonuc['kisi_ad'];	
							$KisiSoyad = $sonuc['kisi_soyad'];	

							// Kişi Durum Belirleme
							if($sonuc['kullanici_durum']=="E")
							{
								$KisiDurum = "Aktif";
								$AktifKullanicilSayisi ++;
							}
							elseif($sonuc['kullanici_durum']=="H")
							{
								$KisiDurum = "Pasif";
								$PasifKullanicilSayisi ++;
							}
							else
							{
								$KisiDurum = "Tanımsız";
							}							
							
							//Kişi resim bilgisi çekme	
							if (file_exists('img/'.$KisiNo.'.jpg')) 
							{
								$KisiResim = $KisiNo;
							}
							else
							{
								$KisiResim = "000";
							}
							$SiraNo ++;	
							echo "<tr data-id='".$KisiNo."' onclick='show(this);' class='asd'>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$SiraNo."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;' id='Btn_Hisse_Detay' data-id='".$KisiNo."' ><img style='cursor: pointer;' class='img-thumbnail' src='img/".$KisiResim.".jpg' width='50' height='50' ></td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiNo."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiAd."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiSoyad."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiDurum."</td>";
							echo "</tr>";
						}
					}						
					?>		
				  </tbody>
				</table>
			</div>
		<div class="col"></div>	
	</div>
	<div class="row">
		<div class="col"></div>
			<div class="col-10">
				<table class="table" style="font-weight: bold;">
				  <tbody>
					<tr>
					  <td style="text-align:left; vertical-align:middle; padding: 0;">
						<button type="button" class="btn btnekle" id="btnekle">+ Yeni Kullanıcı Ekle</button>
					  </td>					
					  <td style="text-align:left; vertical-align:middle; padding: 0;">Aktif Kullanıcı Sayısı : <span style="color: #009D03;"><?php echo $AktifKullanicilSayisi; ?></span></td>
					  <td style="text-align:left; vertical-align:middle; padding: 0;">Pasif Kullanıcı Sayısı : <span style="color: #D90000;"><?php echo $PasifKullanicilSayisi; ?></span></td>
					</tr>
				  </tbody>
				</table>
			</div>
		<div class="col"></div>
	</div>	
</div>

<!-- Personel Ekle Modal -->
<div class="modal fade modal-sm" id="KulEkleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<form class="form-horizontal" id="kaydetKULFRM">
			  <div style="background-color:#D90000; color:white;" class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Yeni Kullanıcı Bilgileri</h5>
			  </div>
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<select class="form-control" id="yeni_kullanici" name="yeni_kullanici">
							<option selected value="0">Kullanıcı Seçiniz</option>
							<?php									
							$KullanicilarSql = "SELECT kisi_no, kisi_ad, kisi_soyad FROM kisi 
												WHERE kisi_no NOT IN (SELECT kullanici_tc FROM kullanicilar)
												AND kisi_tip = 'P'
												AND kisi_durum = 'E'
												ORDER BY kisi_ad ASC";		
							$SorguSonucu = $db->query($KullanicilarSql); // Tablodaki tüm verileri çekiyoruz.
							while ($kullanici = $SorguSonucu->fetch_assoc()) 
							{
								echo "<option value='".$kullanici["kisi_no"]."'>".$kullanici["kisi_ad"]." ".$kullanici["kisi_soyad"]."</option>";
							}
							?>	
						</select>
					</div>	
				</div>
				<br><input type="hidden" id="islemTip" name="islemTip" value="kulEkle">	
				<center id="sonuc"></center>	
			</div>
				<div class="modal-footer">
					<button type="submit" class="btn btnekle modalcustombtn">Kaydet</button>
				</div>
		</form>
	</div>
  </div>
</div>
	
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/jquery-3.5.1.js"></script>	
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap5.min.js"></script>	
	<script>	
		$(document).ready(function () {
			$('#kullanicilar').dataTable({
					"responsive": true,
					"bFilter": true, //Arama kutusu
					"bLengthChange": false, //gösterilecek Kayıt sayısı 
					"bInfo": false, //Kayıt sayısı bilgisi
					"dom": '<"html5buttons"B>lTfgitp',
					"aaSorting": [],
					"language": {
						"emptyTable": "Gösterilecek veri yok.",
						"processing": "Veriler yükleniyor",
						"sDecimal": ".",
						"sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
						"sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
						"sInfoPostFix": "",
						"sInfoThousands": ".",
						"sLengthMenu": "Sayfada _MENU_ kayıt göster",
						"sLoadingRecords": "Yükleniyor...",
						"sSearch": "Ara:",
						"sZeroRecords": "Eşleşen kayıt bulunamadı",
						"oPaginate": {
							"sFirst": "İlk",
							"sLast": "Son",
							"sNext": "Sonraki",
							"sPrevious": "Önceki"
						},
						"oAria": {
							"sSortAscending": ": artan sütun sıralamasını aktifleştir",
							"sSortDescending": ": azalan sütun sıralamasını aktifleştir"
						},
						"select": {
							"rows": {
								"_": "%d kayıt seçildi",
								"0": "",
								"1": "1 kayıt seçildi"
							}
						}
					}
				});
		});	
	</script>
	<script>
		$(document).ready(function() {
			$('a[href="kullanicilar.php"').addClass('active');
		});
	</script> 
	<script>
		function link() {
		  $('a[href="kullanicilar.php"').addClass('active');
		}
	</script>
	<script>
	  let show = row => {
		var KN = row.getAttribute('data-id');  
		//window.location = "kuldetay.php?KN=" + KN;
	  }
	</script>
	
	<script>	
	$('#btnekle').click(function(){
		$("#KulEkleModal").modal('show');
	});	
	</script>
	<script>
		$("#kaydetKULFRM").submit(function (e) {
			$(':input[type="submit"]').prop('disabled', true);
			$(':input[type="submit"]').hide();
			e.preventDefault();
			$.ajax({  
				 url:"ajax.php",  
				 method:"POST",  
				 data:$('#kaydetKULFRM').serialize(),  
				 success:function(cevap){  
					  $('form').trigger("reset");  
					  $('#sonuc').fadeIn().html(cevap);
					  setTimeout(function(){ 
						location.reload();						   
					  }, 3000);						  
				 }  
			}); 
		});			
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
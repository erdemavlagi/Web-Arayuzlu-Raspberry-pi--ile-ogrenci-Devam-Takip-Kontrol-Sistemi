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
	 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" /> -->
	
	

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
			<div class="col-sm-10">
				<table class="table table-hover" id="ogrenciler" cellpadding="0" cellspacing="0" bold ="0" style="background-color: #4D4D4D; color: #FFFFFF;border-collapse: collapse; border-spacing: 0; font-weight: bold;">
				  <thead>
					<tr style="background-color: #D90000; color: #FFFFFF;">
					  <th class="text-center" scope="col">Sıra</th>
					  <th class="text-center" scope="col">Resim</th>
					  <th class="text-center" scope="col">Kişi No</th>
					  <th class="text-center" scope="col">Ad</th>
					  <th class="text-center" scope="col">Soyad</th>
					  <th class="text-center" scope="col">Kişi Tip</th>
					</tr>
				  </thead>	
				  <tbody>
					<?php
					$SiraNo = 0;
					$AktifOgrenciSayisi = 0;
					$KisiSql = "SELECT * FROM kisi WHERE kisi_durum = 'E' AND kisi_tip='O'";
					$SorguSonucu = $db->query($KisiSql); // Tablodaki tüm verileri çekiyoruz.
					if($SorguSonucu)							
					{
						while ($sonuc = $SorguSonucu->fetch_assoc()) 
						{
							$KisiNo = $sonuc['kisi_no'];	
							$KisiAd = $sonuc['kisi_ad'];	
							$KisiSoyad = $sonuc['kisi_soyad'];	
							$AktifOgrenciSayisi ++;

							// Kişi Tip Belirleme
							if($sonuc['kisi_tip']=="O")
							{
								$KisiTip = "Öğrenci";
							}
							elseif($sonuc['kisi_tip']=="P")
							{
								$KisiTip = "Personel";
							}
							else
							{
								$KisiTip = "Tanımsız";
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
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;' data-id='".$KisiNo."' ><img style='cursor: pointer;' class='img-thumbnail' src='img/".$KisiResim.".jpg' width='50' height='50' ></td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiNo."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiAd."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiSoyad."</td>";
							echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$KisiTip."</td>";
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
						<button type="button" i class="btn btnekle" id="btnekle"></i>+ Yeni Öğrenci Ekle</button>
					  </td>					
					  <td style="text-align:left; vertical-align:middle; padding: 0;">Aktif Öğrenci Sayısı : <span style="color: #009D03;"><?php echo $AktifOgrenciSayisi; ?></span></td>
					</tr>
				  </tbody>
				</table>
			</div>
		<div class="col"></div>
	</div>	
</div>

<!-- Öğrenci Ekle Modal -->
<div class="modal fade modal-sm" id="OgrEkleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<form class="form-horizontal" id="kaydetOGRFRM">
			  <div style="background-color:#D90000; color:white;" class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Yeni Öğrenci Bilgileri</h5>
			  </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_OGRNO" name="yeni_OGRNO"  placeholder="Öğrenci No" autocomplete="off" maxlength="10" required>
					</div>	
				</div>
				<br>	
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_AD" name="yeni_AD"  placeholder="Öğrenci Ad" autocomplete="off" required maxlength="25">
					</div>	
				</div>
				<br>
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_SOYAD" name="yeni_SOYAD"  placeholder="Öğrenci Soyad" autocomplete="off"maxlength="25" required>
					</div>	
				</div>
				<br><input type="hidden" id="islemTip" name="islemTip" value="ogrEkle">	
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
			$('#ogrenciler').dataTable({
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
			$('a[href="ogrenciler.php"').addClass('active');
		});
	</script> 
	<script>
		function link() {
		  $('a[href="ogrenciler.php"').addClass('active');
		}
	</script>
	<script>
	  let show = row => {
		var KN = row.getAttribute('data-id');  
		window.location = "ogrdetay.php?KN=" + KN;
	  }
	</script>
	
	<script>	
	$('#btnekle').click(function(){
		$('#yeni_OGRNO').val('');
		$('#yeni_AD').val('');
		$('#yeni_SOYAD').val('');
		$("#OgrEkleModal").modal('show');
		setTimeout(function(){ 
			$("#yeni_OGRNO").focus();					   
		}, 500);			
		
	});	
	</script>
	<script>
		$("#kaydetOGRFRM").submit(function (e) {
			$(':input[type="submit"]').prop('disabled', true);
			$(':input[type="submit"]').hide();
			e.preventDefault();
			$.ajax({  
				 url:"ajax.php",  
				 method:"POST",  
				 data:$('#kaydetOGRFRM').serialize(),  
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
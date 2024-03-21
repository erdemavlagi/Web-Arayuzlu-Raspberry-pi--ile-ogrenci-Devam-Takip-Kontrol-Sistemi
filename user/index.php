<?php 
session_start();
ini_set('display_errors','1'); 
include("../baglan.php");

ob_start();
if(isset($_SESSION["ERDEM_GirisDurum"]) && $_SESSION["ERDEM_GirisDurum"] == "All_is_Well" && isset($_SESSION["ERDEM_KisiYetki"]) && $_SESSION["ERDEM_KisiYetki"] == "1")
{
	$HocaTC = $_SESSION["ERDEM_KisiNo"];
?>
<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/bootstrap-directional-buttons.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">


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
<?php
$Terminal = "";
$Tarih_Baslangic = "";
$Tarih_Bitis = "";
    if(isset($_REQUEST['rapor_getir']))
    {
		$Tarih_Baslangic = $_POST["tarih_baslangic"]." ".$_POST["ders_baslangic"].":01";
		$Tarih_Bitis = $_POST["tarih_baslangic"]." ".$_POST["ders_bitis"].":59";
		$Terminal = $_POST["hoca_terminal"];
		if(strtotime($Tarih_Baslangic) > strtotime($Tarih_Bitis))
		{
			echo "Ders başlangıç saati bitişten büyük olamaz";
		}
    }
?>	
<div class="container-fluid"><br>
	<div class="row">
		<div class="col-md" style="width: auto;"></div>
			<div class="col">
				<div class="container">
					<form action="?" method="POST">
						<div class="row">
							<div class="col-fluid">
								<select class="form-control" id="hoca_terminal" name="hoca_terminal">
									
									<option selected value="0"><center> Terminal Seçiniz </center> </option>
									 
									<?php									
									$HocaTerminalSql = "SELECT * FROM terminaller WHERE terminal_sahibi = '".$HocaTC."'";
									$HocaTerminalSorguSonucu = $db->query($HocaTerminalSql); // Tablodaki tüm verileri çekiyoruz.
									if($HocaTerminalSorguSonucu)							
									{
										while ($sonucHocaTerminal = $HocaTerminalSorguSonucu->fetch_assoc()) 
										{
											echo "<option value='".$sonucHocaTerminal["terminal_kod"]."'>".$sonucHocaTerminal["terminal_kod"]."</option>";
										}
									}	
									?>
								
								</select>
							</div>
							<div class="col-fluid">
								<input type="text" class="form-control" autocomplete="off" id="tarih_baslangic" name="tarih_baslangic" value="<?php echo date("Y-m-d");?>" style="text-align: center;">
							</div>
							<div class="col-fluid">
								<input type="text" class="form-control" autocomplete="off" id="ders_baslangic" name="ders_baslangic" value="<?php echo date("H:i");?>" style="text-align: center;">
							</div>
							<div class="col-fluid">
								<input type="text" class="form-control" autocomplete="off" id="ders_bitis" name="ders_bitis" value="<?php echo date("H:i");?>" style="text-align: center;">
							</div>							
							<div class="col-fluid">
							<button type="submit" id="rapor_getir" name="rapor_getir" class="btn btn btnekle">Rapor Getir</button>
							</div>
					</div>
					</form>  
				</div>
			</div>
		<div class="col"></div>	
	</div>
</div>

		<br>
<div class="container-fluid">
	<div class="row">
		<div class="col"></div>
		<div class="col-10">
		<?php
			$KisiYoklamaSql = "SELECT DISTINCT(K.kisi_no), K.kisi_ad, K.kisi_soyad, Y.yoklama_tarih
								FROM kisi_kart KK, yoklama_log Y, terminaller T, kisi K
								WHERE Y.yoklama_kartno=KK.kart_no
								AND K.kisi_no = KK.kisi_no 
								AND T.terminal_kod=Y.yoklama_tip 
								AND T.terminal_kod = '".$Terminal."'
								AND Y.yoklama_tarih BETWEEN '".$Tarih_Baslangic."' AND '".$Tarih_Bitis."'
								GROUP BY K.kisi_no
								ORDER BY Y.yoklama_tarih DESC";
			$YoklamaSorguSonucu = $db->query($KisiYoklamaSql); // Tablodaki tüm verileri çekiyoruz.
			if($YoklamaSorguSonucu)							
			{
				$SiraNo = 0;	
				//echo $KisiYoklamaSql;
			?>
			<table class="table table-hover" id="yoklamalar" cellpadding="0" cellspacing="0" border="0" style="background-color: #4D4D4D; color: #FFFFFF;border-collapse: collapse; border-spacing: 0; font-weight: bold;">
			  <thead>
				<tr style="background-color: #D90000; color: #FFFFFF;">
					<th class="text-center" scope="col">Sıra</th>
					<th class="text-center" scope="col">Resim</th>
					<th class="text-center" scope="col">Kişi No</th>
					<th class="text-center" scope="col">Ad</th>
					<th class="text-center" scope="col">Soyad</th>
					<th class="text-center" scope="col">Tarih</th>				
				</tr>
			  </thead>
			  <tbody>
			<?php		
				while ($yoklama = $YoklamaSorguSonucu->fetch_assoc()) 
				{
					//Kişi resim bilgisi çekme	
					if (file_exists('../img/'.$yoklama['kisi_no'].'.jpg')) 
					{
						$KisiResim = $yoklama['kisi_no'];
					}
					else
					{
						$KisiResim = "000";
					}					
					$SiraNo ++;	
					echo "<tr data-id='".$yoklama['kisi_no']."' onclick='show(this);' class='asd'>";
						echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$SiraNo."</td>";
						echo "<td style='text-align:center; vertical-align:middle; padding: 0;'  data-id='".$yoklama['kisi_no']."' ><img style='cursor: pointer;' class='img-thumbnail' src='../img/".$KisiResim.".jpg' width='50' height='50' ></td>";
						echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$yoklama['kisi_no']."</td>";
						echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$yoklama['kisi_ad']."</td>";
						echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$yoklama['kisi_soyad']."</td>";
						echo "<td style='text-align:center; vertical-align:middle; padding: 0;'>".$yoklama['yoklama_tarih']."</td>";
					echo "</tr>";	
				}
			?>		
			  </tbody>
			</table>		
		<?php		
			}
		?>
		</div>
		<div class="col"></div>		
	</div>
</div>
	


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../js/jquery-3.5.1.js"></script>	
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="../js/jquery-1.12.4.js"></script>
	<script src="../js/jquery-ui.js"></script>	
	
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap5.min.js"></script>

	<script>	
		$(document).ready(function () {
			$('#yoklamalar').dataTable({
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
	$(function(){
		$("#tarih_baslangic").datepicker({
			monthNames:["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
			dayNames:["Pazar","Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi"],
			dayNamesMin:["Paz","Pts","Sal","Çar","Per","Cum","Cts"],
			prevText:"Geri",
			nextText:"İleri",
			firstDay:1,
			//minDate: new Date(HaftaTarihYil, HaftaTarihAy - 1, HaftaTarihGun),
			dateFormat:"yy-mm-dd"
			
		});
	});
</script>

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
	<script>
	  let show = row => {
		var KN = row.getAttribute('data-id');  
		window.location = "ogrdetay.php?KN=" + KN;
	  }
	</script>
		
  </body>
</html>
<?php
}
else
{
session_destroy();
header("Location: ../giris.php");
}
?>
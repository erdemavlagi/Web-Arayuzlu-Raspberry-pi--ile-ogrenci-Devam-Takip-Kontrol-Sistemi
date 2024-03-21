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
.mmm {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

 .backgroundPasif{
        background: #D90000!important;
		color : #FFFFFF!important;
		border-color : #D90000!important;
    }
 .backgroundAktif{
        background: #009D03!important;
		color : #FFFFFF!important;
		border-color : #009D03!important;
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
	
 .btkaydet{
        background: #4D4D4D;
		color : #FFFFFF;
		font-weight: bold;
    }
.btkaydet:hover {
    color: #000000!important;
    background: #FFB71B!important;
	font-weight: bold!important!important;
	cursor: pointer!important;
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
.tooltip.show {
  opacity: 1;
}

.tooltip-inner {
  background-color: #D90000;
  box-shadow: 0px 0px 4px black;
  opacity: 1 !important;
}

.tooltip.bs-tooltip-right .arrow:before {
  border-right-color: #D90000 !important;
}

.tooltip.bs-tooltip-left .arrow:before {
 border-left-color: #D90000 !important;
}

.tooltip.bs-tooltip-bottom .arrow:before {
 border-bottom-color: #D90000 !important;
}

.tooltip.bs-tooltip-top .arrow:before {
 border-top-color: #D90000 !important;
}	
</style>
	
</head>
  <body onload="link()">
	<?php include("menu.php");?>
	<br>
	<div class="container">	
	<?php
		$Bugun = date("Y-m-d 00:00:01");
		$KisiSql = "SELECT * FROM kisi WHERE kisi_no = '".$_GET["KN"]."'";
		$SorguSonucu = $db->query($KisiSql); // Tablodaki tüm verileri çekiyoruz.
		if($SorguSonucu)							
		{
			while ($sonuc = $SorguSonucu->fetch_assoc()) 
			{
				$KisiNo = $sonuc['kisi_no'];	
				$KisiAd = $sonuc['kisi_ad'];	
				$KisiSoyad = $sonuc['kisi_soyad'];
				$KisiAP = $sonuc['kisi_durum'];
				//Kişi durum belirleme
				if($sonuc['kisi_durum']=="E")
				{
					$KisiDurum = "Aktif";
					$KisiDurumRenk = "backgroundAktif";
					$KisiCheckbox = "checked";
					$KisiNot = "";
				}
				elseif($sonuc['kisi_durum']=="H")
				{
					$KisiDurum = "Pasif";
					$KisiDurumRenk = "backgroundPasif";
					$KisiCheckbox = "";
					$KisiNot = $sonuc['kisi_aciklama'];
				}
				else
				{
					$KisiDurum = "Tanımsız";
				}
				
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
			}
		}	
	?>
		<center>
			<div class="card shadow " style="width: 30rem; color: #1D1D1D; font-weight: bold!important; cursor: default;">
			<div class="card-header" style="color:#FFFFFF; background-color: #D90000;">
				<div class="row">
					<div class="col text-start">Personel Bilgileri</div>
					<div class="col text-end"><i class="fas fa-edit" id="btnduzenle" style="cursor:pointer;"></i></div>
				</div>
			</div>
				<div class="row">
					<div class="col-4 mmm">
						<center class="p-2">
						<img class="img-thumbnail" src="img/<?php echo $KisiResim; ?>.jpg" width="100" height="100">
						</center>
					</div>
					<div class="col-8">
					  <ul class="list-group list-group-flush">
						<li class="list-group-item"><?php echo $KisiNo; ?></li>
						<li class="list-group-item"><?php echo $KisiAd; ?></li>
						<li class="list-group-item"><?php echo $KisiSoyad; ?></li>
						<li class="list-group-item"><div data-toggle="tooltip" data-placement="top" title="<?php echo $KisiNot; ?>" id="KisiDurum"><?php echo $KisiDurum; ?></div></li>
					  </ul>					
					</div>
				</div>
			</div>
		</center>
		<br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
			<?php
				$TerminalSql = "SELECT * FROM terminaller WHERE  terminal_sahibi = '".$_GET["KN"]."' ORDER BY terminal_durum";
				$TerminalSorguSonucu = $db->query($TerminalSql); // Tablodaki tüm verileri çekiyoruz.
				if($TerminalSorguSonucu)							
				{
					$SiraNo = 0;	
				?>
				<button type="button" class="btn btnekle" id="btnterminalekle">+ Yeni Terminal Ekle</button>
				<table class="table" id="yoklamalar" cellpadding="0" cellspacing="0" border="0" style="background-color: #4D4D4D; color: #FFFFFF;border-collapse: collapse; border-spacing: 0; font-weight: bold;">
				  <thead>
					<tr style="background-color: #D90000; color: #FFFFFF;">
					  <th scope="col">Sıra</th>
					  <th scope="col">Terminal</th>
					  <th scope="col">Terminal Durum</th>
					</tr>
				  </thead>
				  <tbody>
				<?php		
					while ($terminal = $TerminalSorguSonucu->fetch_assoc()) 
					{
						$SiraNo ++;
						//Aktif kart bilgisi
						if ($terminal['terminal_durum'] =="E") 
						{
							$TerminalDurum = "Aktif";
						}
						else
						{
							$TerminalDurum = "Pasif";
						}
						
						echo "<tr>";
							echo "<td>".$SiraNo."</td>";
							echo "<td>".$terminal['terminal_kod']."</td>";
							echo "<td>".$TerminalDurum."</td>";
						echo "</tr>";	
					}
				?>		
				  </tbody>
				</table>		
			<?php		
				}
			?>
			</div>
			<div class="col-3"></div>		
		</div>
	</div>

<!-- Öğrenci Ekle Modal -->
<div class="modal fade modal-sm" id="OgrDuzenleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<form class="form-horizontal" id="kaydetOGRFRM">
			  <div style="background-color:#D90000; color:white;" class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Personel Bilgisi Düzenleme</h5>
			  </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_OGRNO" name="yeni_OGRNO"  placeholder="TcKimlik No" autocomplete="off" maxlength="10" required readonly>
					  <input type="hidden" id="KN" name="KN" value="<?php echo $KisiNo; ?>">
					</div>	
				</div>
				<br>	
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_AD" name="yeni_AD"  placeholder="Personel Ad" autocomplete="off" required maxlength="25">
					</div>	
				</div>
				<br>
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_SOYAD" name="yeni_SOYAD"  placeholder="Personel Soyad" autocomplete="off"maxlength="25" required>
					</div>	
				</div>
				<br>				
				<div class="row">
						<button type="button" class="btn btn-block <?php echo $KisiDurumRenk; ?>" id="chkjs"><strong id="checkboxlbl"><?php echo $KisiDurum; ?></strong></button>
					<input type="hidden" id="yeni_DURUM" name="yeni_DURUM" value="<?php echo $KisiAP; ?>">	
				</div>
				<br>				
				<div class="row">
					<textarea style="resize: none;" class="form-control" id="yeni_ACIKLAMA" name="yeni_ACIKLAMA" value="" rows="3" placeholder="Açıklama"></textarea>
				</div>
				<input type="hidden" id="islemTip" name="islemTip" value="perGuncelle">	
				<center id="sonuc"></center>	
			</div>
				<div class="modal-footer">
					<button type="submit" class="btn btkaydet">Guncelle</button>
				</div>
		</form>
	</div>
  </div>
</div>

<!-- Kart Ekle Modal -->
<div class="modal fade modal-sm" id="TerminalEkleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<form class="form-horizontal" id="kaydetTERMINALFRM">
			  <div style="background-color:#D90000; color:white;" class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Yeni Terminal Bilgileri</h5>
			  </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
					  <input type="text" class="form-control" id="yeni_TERMINALAD" name="yeni_TERMINALAD"  placeholder="Terminal Ad" autocomplete="off" maxlength="10" required>
					</div>	
				</div>
				<br>	
				<input type="hidden" id="islemTip" name="islemTip" value="terminalEkle">
				<input type="hidden" id="kisiNO" name="kisiNO" value="<?php echo $KisiNo; ?>">				
				<center id="sonuc_terminal"></center>	
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
	$('#btnduzenle').click(function(){
		$('#yeni_OGRNO').val('');
		$('#yeni_AD').val('');
		$('#yeni_SOYAD').val('');
		$('#yeni_OGRNO').val('<?php echo $KisiNo; ?>');
		$('#yeni_AD').val('<?php echo $KisiAd; ?>');
		$('#yeni_SOYAD').val('<?php echo $KisiSoyad; ?>');		
		$('#yeni_DURUM').val('<?php echo $KisiAP; ?>');
		$('#yeni_ACIKLAMA').val('<?php echo $KisiNot; ?>');
		$('#checkboxlblRow').addClass("<?php echo $KisiDurumRenk; ?>");
		$('#chkjs').addClass("<?php echo $KisiDurumRenk; ?>");
		$('#checkboxlbl').html("<?php echo $KisiDurum; ?>");
		var xyz = $('#yeni_DURUM').val();
		if(xyz=="E")
		{
			$('#checkboxlblRow').removeClass("backgroundPasif");
			$('#checkboxlblRow').addClass("backgroundAktif");
			$('#chkjs').removeClass("backgroundPasif");
			$('#chkjs').addClass("backgroundAktif");
			$('#checkboxlbl').html("Aktif");
			$('#yeni_ACIKLAMA').hide();
		}
		else
		{
			$('#checkboxlblRow').removeClass("backgroundAktif");
			$('#checkboxlblRow').addClass("backgroundPasif");
			$('#chkjs').removeClass("backgroundAktif");
			$('#chkjs').addClass("backgroundPasif");
			$('#checkboxlbl').html("Pasif");
			$('#yeni_ACIKLAMA').show();
		}
		$("#OgrDuzenleModal").modal('show');		
	});	
	</script>	
	<script>
    $(document).ready(function () {
        $('#chkjs').click(function () {
			var inputVal = $('#yeni_DURUM').val();
            if (inputVal=="H")
			{
				$('#yeni_DURUM').val("E");
				$('#checkboxlblRow').removeClass("backgroundPasif");
				$('#checkboxlblRow').addClass("backgroundAktif");
				$('#chkjs').removeClass("backgroundPasif");
				$('#chkjs').addClass("backgroundAktif");
				$('#checkboxlbl').html("Aktif");
				$('#yeni_ACIKLAMA').hide();
			}
			else
			{
				$('#yeni_DURUM').val("H");
				$('#checkboxlblRow').removeClass("backgroundAktif");
				$('#checkboxlblRow').addClass("backgroundPasif");
				$('#chkjs').removeClass("backgroundAktif");
				$('#chkjs').addClass("backgroundPasif");
				$('#checkboxlbl').html("Pasif");
				$('#yeni_ACIKLAMA').show();
			}
        });
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
					  //$('form').trigger("reset");  
					  $('#sonuc').fadeIn().html(cevap);
					  setTimeout(function(){ 
						location.reload();						   
					  }, 3000);						  
				 }  
			});
		});			
	</script>
	<script>	
		$(document).ready(function () {
			$('#yoklamalar').dataTable({
					"responsive": true,
					"bFilter": false, //Arama kutusu
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
	$('#btnterminalekle').click(function(){
		$('#yeni_TERMINALAD').val('');
		$("#TerminalEkleModal").modal('show');
		setTimeout(function(){ 
			$("#yeni_TERMINALAD").focus();					   
		}, 500);			
	});	
	</script>
	
	<script>
		$("#kaydetTERMINALFRM").submit(function (e) {
			$(':input[type="submit"]').prop('disabled', true);
			$(':input[type="submit"]').hide();
			e.preventDefault();
			$.ajax({  
				 url:"ajax.php",  
				 method:"POST",  
				 data:$('#kaydetTERMINALFRM').serialize(),  
				 success:function(cevap){  
					  //$('form').trigger("reset");  
					  $('#sonuc_terminal').fadeIn().html(cevap);
					  setTimeout(function(){ 
						location.reload();						   
					  }, 3000);						  
				 }  
			});
		});			
	</script>
	
	<script>
		$(document).ready(function() {
			$('a[href="personeller.php"').addClass('active');
		});
	</script> 
	<script>
		function link() {
		  $('a[href="personeller.php"').addClass('active');
		}
	</script>
	<script>
    setInterval(function(){
        $("#KisiDurum").toggleClass("<?php echo $KisiDurumRenk; ?>");
     },1000)	
	</script>
	<script> 
		$(function () {
			$('[data-toggle="tooltip"]').tooltip({html:true})
		})
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
<?php
include("baglan.php");
$Mesaj="";
if (isset($_POST["islemTip"]) && $_POST["islemTip"]=="ogrEkle") 
{
	if(isset($_POST['yeni_OGRNO']) && strlen($_POST['yeni_OGRNO']) == 10 && is_string($_POST['yeni_OGRNO']))
	{
		if(isset($_POST['yeni_AD']) && is_string($_POST['yeni_AD']) && $_POST['yeni_AD'] != "")
		{
			if(isset($_POST['yeni_SOYAD']) && is_string($_POST['yeni_SOYAD']) && $_POST['yeni_SOYAD'] != "")
			{
				$Sql = "INSERT INTO kisi (kisi_no, kisi_ad, kisi_soyad, kisi_tip) values ('".$_POST['yeni_OGRNO']."','".$_POST['yeni_AD']."','".$_POST['yeni_SOYAD']."','O')";
				$SorguSonucu = $db->query($Sql);
				if($SorguSonucu !== 0)
				{
					$Mesaj = "<div class='alert alert-success' role='alert'>Kayıt İşlemi Başarılı</div>";
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Kayıt İşlemi Başarısız</div>";
				}
			}
			else
			{
				$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Soyadı bilgisi !</div>";
			}				
		}
		else
		{
			$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Ad bilgisi !</div>";
		}				
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Öğrenci No bilgisi !</div>";
	}		
} 
elseif (isset($_POST["islemTip"]) && $_POST["islemTip"]=="ogrGuncelle") 
{
	if(isset($_POST['KN']) && strlen($_POST['KN']) == 10 && is_string($_POST['KN']))
	{
		if(isset($_POST['yeni_AD']) && is_string($_POST['yeni_AD']) && $_POST['yeni_AD'] != "")
		{
			if(isset($_POST['yeni_SOYAD']) && is_string($_POST['yeni_SOYAD']) && $_POST['yeni_SOYAD'] != "")
			{
				$Sql = "UPDATE kisi SET kisi_ad='".$_POST['yeni_AD']."', kisi_soyad='".$_POST['yeni_SOYAD']."', kisi_durum='".$_POST['yeni_DURUM']."', kisi_aciklama='".$_POST['yeni_ACIKLAMA']."' WHERE kisi_no = '".$_POST['KN']."'";
				$SorguSonucu = $db->query($Sql);
				if($SorguSonucu !== 0)
				{
					$Mesaj = "<div class='alert alert-success' role='alert'>Güncelleme İşlemi Başarılı</div>";
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Güncelleme İşlemi Başarısız</div>";
				}
			}
			else
			{
				$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Soyadı bilgisi !</div>";
			}				
		}
		else
		{
			$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Ad bilgisi !</div>";
		}				
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Öğrenci No bilgisi !</div>";
	}
}
elseif (isset($_POST["islemTip"]) && $_POST["islemTip"]=="perEkle") 
{
	if(isset($_POST['yeni_OGRNO']) && strlen($_POST['yeni_OGRNO']) == 11 && is_string($_POST['yeni_OGRNO']))
	{
		if(isset($_POST['yeni_AD']) && is_string($_POST['yeni_AD']) && $_POST['yeni_AD'] != "")
		{
			if(isset($_POST['yeni_SOYAD']) && is_string($_POST['yeni_SOYAD']) && $_POST['yeni_SOYAD'] != "")
			{
				$Sql = "INSERT INTO kisi (kisi_no, kisi_ad, kisi_soyad,kisi_tip) values ('".$_POST['yeni_OGRNO']."','".$_POST['yeni_AD']."','".$_POST['yeni_SOYAD']."','P')";
				$SorguSonucu = $db->query($Sql);
				if($SorguSonucu !== 0)
				{
					$Mesaj = "<div class='alert alert-success' role='alert'>Kayıt İşlemi Başarılı</div>";
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Kayıt İşlemi Başarısız</div>";
				}
			}
			else
			{
				$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Soyadı bilgisi !</div>";
			}				
		}
		else
		{
			$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Ad bilgisi !</div>";
		}				
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı TcKimlik No bilgisi !</div>";
	}
}
elseif (isset($_POST["islemTip"]) && $_POST["islemTip"]=="perGuncelle") 
{
	if(isset($_POST['KN']) && strlen($_POST['KN']) == 11 && is_string($_POST['KN']))
	{
		if(isset($_POST['yeni_AD']) && is_string($_POST['yeni_AD']) && $_POST['yeni_AD'] != "")
		{
			if(isset($_POST['yeni_SOYAD']) && is_string($_POST['yeni_SOYAD']) && $_POST['yeni_SOYAD'] != "")
			{
				$Sql = "UPDATE kisi SET kisi_ad='".$_POST['yeni_AD']."', kisi_soyad='".$_POST['yeni_SOYAD']."', kisi_durum='".$_POST['yeni_DURUM']."', kisi_aciklama='".$_POST['yeni_ACIKLAMA']."' WHERE kisi_no = '".$_POST['KN']."'";
				$SorguSonucu = $db->query($Sql);
				$Sql2 = "UPDATE kullanicilar SET kullanici_durum='".$_POST['yeni_DURUM']."' WHERE kullanici_tc = '".$_POST['KN']."'";
				$SorguSonucu2 = $db->query($Sql2);				
				if($SorguSonucu !== 0)
				{
					$Mesaj = "<div class='alert alert-success' role='alert'>Güncelleme İşlemi Başarılı</div>";
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Güncelleme İşlemi Başarısız</div>";
				}
			}
			else
			{
				$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Soyadı bilgisi !</div>";
			}				
		}
		else
		{
			$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Ad bilgisi !</div>";
		}				
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı TcKimlik No bilgisi !</div>";
	}
}
elseif (isset($_POST["islemTip"]) && $_POST["islemTip"]=="kartEkle") 
{
	if(isset($_POST['kisiNO']) && strlen($_POST['kisiNO']) == 10 && is_string($_POST['kisiNO']))
	{
		if(isset($_POST['yeni_KARTNO']) && is_string($_POST['yeni_KARTNO']) && $_POST['yeni_KARTNO'] != "")
		{
			$Sql = "UPDATE kisi_kart SET kart_durum='H' WHERE kisi_no = '".$_POST['kisiNO']."'";
			$SorguSonucu = $db->query($Sql);
			if($SorguSonucu !== 0)
			{
				$Sql = "INSERT INTO kisi_kart (kisi_no, kart_no) values ('".$_POST['kisiNO']."','".$_POST['yeni_KARTNO']."')";
				$SorguSonucu = $db->query($Sql);
				if($SorguSonucu !== 0)
				{
					$Mesaj = "<div class='alert alert-success' role='alert'>Kayıt İşlemi Başarılı</div>";
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Kayıt İşlemi Başarısız</div>";
				}
			}
			else
			{
				$Mesaj = "<div class='alert alert-danger' role='alert'>Başarısız İşlemi Başarısız X2</div>";
			}			
		}
		else
		{
			$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Kart bilgisi !</div>";
		}				
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı TcKimlik No bilgisi !</div>";
	}
}
elseif (isset($_POST["islemTip"]) && $_POST["islemTip"]=="terminalEkle") 
{
	if(isset($_POST['kisiNO']) && strlen($_POST['kisiNO']) == 11 && is_string($_POST['kisiNO']))
	{
		if(isset($_POST['yeni_TERMINALAD']) && is_string($_POST['yeni_TERMINALAD']) && $_POST['yeni_TERMINALAD'] != "")
		{
			$Sql = "UPDATE terminaller SET terminal_durum='H' WHERE terminal_sahibi = '".$_POST['kisiNO']."'";
			$SorguSonucu = $db->query($Sql);
			if($SorguSonucu !== 0)
			{
				$Sql = "INSERT INTO terminaller (terminal_sahibi, terminal_kod) values ('".$_POST['kisiNO']."','".$_POST['yeni_TERMINALAD']."')";
				$SorguSonucu = $db->query($Sql);
				if($SorguSonucu !== 0)
				{
					$Mesaj = "<div class='alert alert-success' role='alert'>Kayıt İşlemi Başarılı</div>";
				}
				else
				{
					$Mesaj = "<div class='alert alert-danger' role='alert'>Kayıt İşlemi Başarısız</div>";
				}
			}
			else
			{
				$Mesaj = "<div class='alert alert-danger' role='alert'>Başarısız İşlem</div>";
			}			
		}
		else
		{
			$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı Kart bilgisi !</div>";
		}				
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı TcKimlik No bilgisi !</div>";
	}
}
elseif (isset($_POST["islemTip"]) && $_POST["islemTip"]=="kulEkle") 
{
	if(isset($_POST['yeni_kullanici']) && strlen($_POST['yeni_kullanici']) == 11 && is_string($_POST['yeni_kullanici']))
	{
		$Sql = "INSERT INTO kullanicilar (kullanici_tc) values ('".$_POST['yeni_kullanici']."')";
		$SorguSonucu = $db->query($Sql);
		if($SorguSonucu !== 0)
		{
			$Mesaj = "<div class='alert alert-success' role='alert'>Kayıt İşlemi Başarılı</div>";
		}
		else
		{
			$Mesaj = "<div class='alert alert-danger' role='alert'>Kayıt İşlemi Başarısız</div>";
		}
	}
	else
	{
		$Mesaj = "<div class='alert alert-warning' role='alert'>Eksik yada hatalı kullanıcı bilgisi !</div>";
	}
}
else 
{
	$Mesaj = "<div class='alert alert-warning' role='alert'>Hatalı İşlem !</div>";
}

echo $Mesaj;
?> 
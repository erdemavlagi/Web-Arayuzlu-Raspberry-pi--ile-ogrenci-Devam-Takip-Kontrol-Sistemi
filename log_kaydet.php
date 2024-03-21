<?php
if(isset($_POST["KART_NO"], $_POST["iplik"], $_POST["TARIH"], $_POST["GECIS_TIP"]))
{
	$KART_NO = $_POST["KART_NO"];
	$TERMINAL_IP = $_POST["iplik"];	
	$TARIH = $_POST["TARIH"];
	$GECIS_TIP = $_POST["GECIS_TIP"];

	include("baglan.php");
	$LogKaydetSql = "INSERT INTO yoklama_log (yoklama_kartno,yoklama_tarih,yoklama_ip,yoklama_tip) VALUES('".$KART_NO."','".$TARIH."','".$TERMINAL_IP."','".$GECIS_TIP."')";
	$IslemSor = $db->query($LogKaydetSql);
	if($IslemSor)							
	{
		echo "true";
	} 
	else 
	{ 
		echo "false"; 
	}							
} 
else 
{ 
	echo "false"; 
}
?>
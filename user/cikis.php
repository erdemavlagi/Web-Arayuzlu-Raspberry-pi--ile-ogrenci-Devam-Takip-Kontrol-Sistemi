<?php
session_start();
unset($_SESSION['ERDEM_KisiNo']);
unset($_SESSION['ERDEM_KisiAd']);
unset($_SESSION['ERDEM_KisiSoyad']);
unset($_SESSION['ERDEM_KisiYetki']);
unset($_SESSION['ERDEM_GirisDurum']);
session_destroy();
header("Location: ../giris.php");
?>

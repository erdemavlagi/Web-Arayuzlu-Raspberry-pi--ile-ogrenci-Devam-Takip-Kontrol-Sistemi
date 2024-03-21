<?php

@$db = new mysqli('localhost', 'ybsodks_erdem', '35EA0377', 'ybsodks_erdem'); // Veritabanı bağlantımızı yapıyoruz.
    if(mysqli_connect_error()) //Eğer hata varsa yazdırıyoruz 
    {
        echo mysqli_connect_error();
        exit; //eğer bağlantıda hata varsa PHP çalışmasını sonlandırıyoruz.
    }

$db->set_charset("utf8"); // Türkçe karakter sorunu olmaması için utf8'e çeviriyoruz.

?>


<!--Bağlanırken sql kodtrol edilmelidir.  -->



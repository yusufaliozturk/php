<?php
ob_start(); //Sayfanin daha hizli y�klenmesine yardimci olur
session_start(); //Oturumumuzu baslatiyoruz
session_destroy(); //Oturumumuzu sonlandiriyoruz
echo '<meta http-equiv="refresh" content="0;URL=index.php">'; //Anasayfa yani giris formu sayfasina y�nlendiriyoruz
ob_end_flush(); //ob_start() fonksiyonu temizliyoruz
?>
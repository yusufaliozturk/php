
<?php
##################################################
#           Veritabani Ayarlari
#
#   $vt_host      = Veritabani Hostu
#   $vt_kullanici = Veritabani Kullanici Adi
#   $vt_sifre     = Veritabani Sifresi
#   $vt_adi       = Veritabani Adi
#
##################################################
 
$vt_host       = "localhost";
$vt_kullanici  = "root";
$vt_sifre      = "12345678";
$vt_adi        = "users";
 
//Veritabani baglantisini yapiyoruz
$vtbaglan = @mysql_connect($vt_host,$vt_kullanici,$vt_sifre) or die("Veritabani baglantisi saglanamadi!");
mysql_select_db($vt_adi,$vtbaglan) or die("Veritabani bulunamadi!");
?>
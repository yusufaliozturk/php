<?php
//Veritaban� ba�lant� dosyam�z� �ekiyoruz
require_once("baglan.php");
 
$adim = $_GET['adim'];
switch($adim){
case "":
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Uye Kay�t Formu</title>
</head>
 
<body>
<form action="kayit.php?adim=kayitonay" method="post">
<table width="400" border="0">
  <tr>
    <td width="115">Kullanici Adi</td>
    <td width="269"><input name="kyt_kulladi" type="text" /> <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td>Sifreniz</td>
    <td><input name="kyt_sifre" type="password" /> <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td>Sifreniz(Tekrar)</td>
    <td><input name="kyt_sifretekrar" type="password" /> <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td>E-Mail</td>
    <td><input name="kyt_email" type="text" /></td>
  </tr>
   <tr>
    <td> </td>
    <td><input type="submit" value="Kayit Ol" /></td>
  </tr>
</table>
</form>
<br />Giris yapmak icin <a href="index.php">tiklayiniz</a>
</body>
</html>
 
<?php
break;
 
case "kayitonay":
//Kay�t formundan metin kutusu verilerini �ekiyoruz
$kullanici_adi         = $_POST['kyt_kulladi'];
$kullanici_sifre       = $_POST['kyt_sifre'];
$kullanici_sifretekrar = $_POST['kyt_sifretekrar'];
$kullanici_email       = $_POST['kyt_email'];
 
if(($kullanici_adi == "") and ($kullanici_sifre == "") and ($kullanici_sifretekrar == "")){ //E�er kullan�c� ad�, �ifresi ve �ifre(tekrar) alan� bo� ise hata mesaj� verdiriyoruz
    echo '<script type="text/javascript">alert("Bo� b�rakt���n�z alanlar var!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}elseif($kullanici_sifre != $kullanici_sifretekrar){ //E�er kullan�c� �ifresi ve �ifre(tekrar) e�le�miyorsa hata mesaj� verdiriyoruz
    echo '<script type="text/javascript">alert("�ifreleriniz birbiriyle uyu�muyor!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}else{ //E�er bo� b�rak�lan bir alan yoksa, �ifre ve �ifre(tekrar) e�le�iyorsa kullan�c� kay�t i�lemini ger�ekle�tiriyoruz
    $kullanici_kaydet = mysql_query("INSERT INTO uyeler (kulladi,kullsifre,mail) VALUES ('$kullanici_adi','$kullanici_sifre','$kullanici_email')"); //Kullan�c�y� veritaban�na kaydedicek mysql kodu
    echo '<script type="text/javascript">alert("Kay�t i�leminiz ba�ar�yla ger�ekle�ti!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}
break;
}
?>
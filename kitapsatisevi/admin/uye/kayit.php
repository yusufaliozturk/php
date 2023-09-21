<?php
//Veritabaný baðlantý dosyamýzý çekiyoruz
require_once("baglan.php");
 
$adim = $_GET['adim'];
switch($adim){
case "":
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Uye Kayýt Formu</title>
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
//Kayýt formundan metin kutusu verilerini çekiyoruz
$kullanici_adi         = $_POST['kyt_kulladi'];
$kullanici_sifre       = $_POST['kyt_sifre'];
$kullanici_sifretekrar = $_POST['kyt_sifretekrar'];
$kullanici_email       = $_POST['kyt_email'];
 
if(($kullanici_adi == "") and ($kullanici_sifre == "") and ($kullanici_sifretekrar == "")){ //Eðer kullanýcý adý, þifresi ve þifre(tekrar) alaný boþ ise hata mesajý verdiriyoruz
    echo '<script type="text/javascript">alert("Boþ býraktýðýnýz alanlar var!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}elseif($kullanici_sifre != $kullanici_sifretekrar){ //Eðer kullanýcý þifresi ve þifre(tekrar) eþleþmiyorsa hata mesajý verdiriyoruz
    echo '<script type="text/javascript">alert("Þifreleriniz birbiriyle uyuþmuyor!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}else{ //Eðer boþ býrakýlan bir alan yoksa, þifre ve þifre(tekrar) eþleþiyorsa kullanýcý kayýt iþlemini gerçekleþtiriyoruz
    $kullanici_kaydet = mysql_query("INSERT INTO uyeler (kulladi,kullsifre,mail) VALUES ('$kullanici_adi','$kullanici_sifre','$kullanici_email')"); //Kullanýcýyý veritabanýna kaydedicek mysql kodu
    echo '<script type="text/javascript">alert("Kayýt iþleminiz baþarýyla gerçekleþti!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=kayit.php">';
}
break;
}
?>
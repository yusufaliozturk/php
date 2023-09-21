<?php
//Oturumumuzu baþlatýyoruz
session_start();
//Veritabaný baðlantý dosyamýzý çekiyoruz
require_once("baglan.php");
 
//Bir string deðiþken oluþturduk
$adim = $_GET['adim'];
switch($adim){
case "": //Atadýðýmýz string deðiþkenimize hiçbir deðer atanmamýþ ise giriþ formunu gösteriyoruz
if($_SESSION['rutbe'] != 5){ //Giriþ yapan kullanýcýya atadýðýmýz rütbe eðer doðru deðilse giriþ panelini tekrar gösteriyoruz
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Uye Girisi</title>
</head>
 
<body>
<form action="index.php?adim=girisonay" method="post">
<table width="400" border="0">
  <tr>
    <td width="115">Kullanici Adi</td>
    <td width="269"><input name="grs_kulladi" type="text" /></td>
  </tr>
  <tr>
    <td>Sifreniz</td>
    <td><input name="grs_sifre" type="password" /></td>
  </tr>
   <tr>
    <td> </td>
    <td><input type="submit" value="Giris Yap" /></td>
  </tr>
</table>
</form>
<br />Kayit olmak icin <a href="kayit.php">tiklayiniz</a>
</body>
</html>
 
<?php
}else{ //Giriþ yapan kullanýcýya atadýðýmýz rütbe doðruysa profil sayfasýna yönlendiriyoruz
    echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
}
break;
 
case "girisonay":
//Giriþ formundan metin kutusu verilerini çekiyoruz
$giris_adi   = $_POST['grs_kulladi'];
$giris_sifre = $_POST['grs_sifre'];
 
if(($giris_adi == "") or ($giris_sifre == "")){ //Eðer kullanýcý adý ve þifre alaný boþ býrakýlýrsa bir hata mesajý verdiriyoruz
    echo '<script type="text/javascript">alert("Boþ býraktýðýnýz alanlar var!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}else{ //Eðer kullanýcý adý ve þifre alaný boþ deðilse kullanýcý bilgilerini veritabanýndaki bilgiler ile karþýlarþtýrýyoruz
    $uyeler = mysql_query("SELECT * FROM uyeler WHERE kulladi='$giris_adi' and kullsifre='$giris_sifre'"); //Veritabanýndaki uyeler tablosundaki verilerimizi metin kutusu verileri ile eþleþtiriyoruz
    $uyebul = mysql_num_rows($uyeler); //Üyeleri sayý olarak tanýmlýyoruz
    if($uyebul > 0){ //Eðer üye varsa aþaðýdaki kodlarý çalýþtýrýyoruz
        $mailcek = mysql_query("SELECT * FROM uyeler WHERE kulladi='$giris_adi'"); //Giriþ doðrulanýrsa giriþ yapan kiþinin kullanýcý adý ile mail adresini eþleþtiriyoruz
        $mailcek2 = mysql_fetch_array($mailcek); //Giriþ yapan kiþinin kullanýcý adý ve mail adresi eþleþen mail adresini yeni bir deðiþkene atýyoruz
        $_SESSION['kulladi'] = $giris_adi; //Giriþ doðrulanýrsa metin kutusundaki kullanýcý adýný kulladi isimli SESSION'a atýyoruz
        $_SESSION['email']   = $mailcek2['mail']; //Giriþ doðrulanýrsa profil sayfasý için giriþ yapan kiþinin kullanýcý adý ile eþleþen mail adresini email isimli SESSION'a atýyoruz
        $_SESSION['rutbe']   = 5; //Giriþ doðrulanýrsa rutbe isimli bir SESSION oluþturup istediðimiz bir deðer atýyoruz
        echo '<script type="text/javascript">alert("Baþarýyla giriþ yaptýnýz! Profil sayfanýza yönlendirileceksiniz...");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
    }else{ //Eðer kullanýcý adý veya þifre yanlýþsa veya yoksa hata mesajý verdiriyoruz
        echo '<script type="text/javascript">alert("Kullanýcý adý veya þifreniz yanlýþ!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
}
break;
}
?>
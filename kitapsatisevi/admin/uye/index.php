<?php
//Oturumumuzu ba�lat�yoruz
session_start();
//Veritaban� ba�lant� dosyam�z� �ekiyoruz
require_once("baglan.php");
 
//Bir string de�i�ken olu�turduk
$adim = $_GET['adim'];
switch($adim){
case "": //Atad���m�z string de�i�kenimize hi�bir de�er atanmam�� ise giri� formunu g�steriyoruz
if($_SESSION['rutbe'] != 5){ //Giri� yapan kullan�c�ya atad���m�z r�tbe e�er do�ru de�ilse giri� panelini tekrar g�steriyoruz
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
}else{ //Giri� yapan kullan�c�ya atad���m�z r�tbe do�ruysa profil sayfas�na y�nlendiriyoruz
    echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
}
break;
 
case "girisonay":
//Giri� formundan metin kutusu verilerini �ekiyoruz
$giris_adi   = $_POST['grs_kulladi'];
$giris_sifre = $_POST['grs_sifre'];
 
if(($giris_adi == "") or ($giris_sifre == "")){ //E�er kullan�c� ad� ve �ifre alan� bo� b�rak�l�rsa bir hata mesaj� verdiriyoruz
    echo '<script type="text/javascript">alert("Bo� b�rakt���n�z alanlar var!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}else{ //E�er kullan�c� ad� ve �ifre alan� bo� de�ilse kullan�c� bilgilerini veritaban�ndaki bilgiler ile kar��lar�t�r�yoruz
    $uyeler = mysql_query("SELECT * FROM uyeler WHERE kulladi='$giris_adi' and kullsifre='$giris_sifre'"); //Veritaban�ndaki uyeler tablosundaki verilerimizi metin kutusu verileri ile e�le�tiriyoruz
    $uyebul = mysql_num_rows($uyeler); //�yeleri say� olarak tan�ml�yoruz
    if($uyebul > 0){ //E�er �ye varsa a�a��daki kodlar� �al��t�r�yoruz
        $mailcek = mysql_query("SELECT * FROM uyeler WHERE kulladi='$giris_adi'"); //Giri� do�rulan�rsa giri� yapan ki�inin kullan�c� ad� ile mail adresini e�le�tiriyoruz
        $mailcek2 = mysql_fetch_array($mailcek); //Giri� yapan ki�inin kullan�c� ad� ve mail adresi e�le�en mail adresini yeni bir de�i�kene at�yoruz
        $_SESSION['kulladi'] = $giris_adi; //Giri� do�rulan�rsa metin kutusundaki kullan�c� ad�n� kulladi isimli SESSION'a at�yoruz
        $_SESSION['email']   = $mailcek2['mail']; //Giri� do�rulan�rsa profil sayfas� i�in giri� yapan ki�inin kullan�c� ad� ile e�le�en mail adresini email isimli SESSION'a at�yoruz
        $_SESSION['rutbe']   = 5; //Giri� do�rulan�rsa rutbe isimli bir SESSION olu�turup istedi�imiz bir de�er at�yoruz
        echo '<script type="text/javascript">alert("Ba�ar�yla giri� yapt�n�z! Profil sayfan�za y�nlendirileceksiniz...");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=profil.php">';
    }else{ //E�er kullan�c� ad� veya �ifre yanl��sa veya yoksa hata mesaj� verdiriyoruz
        echo '<script type="text/javascript">alert("Kullan�c� ad� veya �ifreniz yanl��!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
}
break;
}
?>
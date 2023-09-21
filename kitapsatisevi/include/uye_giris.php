

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<title>
</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="" method="post">
</form>
<table>
  <tr>
    <td>E-posta</td>
    <td><input type="text" name="eposta"/></td>
  </tr>
  <tr>
    <td>Şifre</td>
    <td><input type="password" name"sifre"/></td>
  </tr>
   <tr>
    <td colspan="2"><input type="submit" value="Giriş" name="giris"/></td>
 </tr>
    <tr>
    <td colspan="2"><a href="#">Yeni Üye</a></td>
 </tr>
  <tr>
  	<td colspan="2"><a href="#">Şifremi Unuttum</a></td>
    </tr>
</table>

<?php
include("../include/ayar.php");
$eposta=$_POST["eposta"];
$sifre=$_POST["sifre"];
$sorgu=mysql_query("select * from kullanici where Eposta,$baglanti")
while{
	$dizi=mysql_fetch_array($sorgu);
}

?>

</body>
</html>

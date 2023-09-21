

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gossip Kitabevi</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="disdiv">
  <?php 
  include("include/ayar2.php");

  include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  
 ?>
   
    
   
    
    

  <div class="orta">
  <h3> Şifremi Unuttum</h3>
<form action="" name="bilgi1" method="post">
<table>
 <tr>
        <td>Kullanıcı Adınız</td>
        <td>:</td>
        <td><input type="text"  name="kulad" value="" /></td>
      </tr>
      <tr>
        <td> E-Posta</td>
        <td>:</td>
        <td><input type="text"  name="eposta" value="" /></td>
      </tr>
<tr>     
</table>
<input type="submit" name="gonder1" value="Gönder"/>
</form>
<?php

$eposta=$_POST['eposta'];
$kullanici=$_POST['kulad'];

if($_POST['gonder1']){
$ara = mysql_query("SELECT * FROM kullanici WHERE KullaniciAd='$kullanici' OR Eposta='$eposta'");
$sorgula = mysql_fetch_array($ara);
$kulid=$sorgula['idKullanici'];
$gizlisoru=$sorgula['GizliSoru'];

header("location:sifremi_unuttum2.php?id=$kulid&gsoru=$gizlisoru");


}

?>
</div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

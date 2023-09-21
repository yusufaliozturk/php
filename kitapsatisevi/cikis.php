

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
  include("include/ayar.php");

  include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Çıkış Yaptı','$tarihlog')");
 ?>
   
    
   
    
    

  <div class="orta">

<?php 

if(isset($_SESSION['idKullanici']))
{$guncelle=mysql_query("update kullanici set SonLogin='$tarihlogin' where idKullanici='$_SESSION[idKullanici]'");
	session_destroy();
        echo "<center>Session sonlandırıldı.Ana Sayfaya Yonlendiriliyorsunuz.</center>";
	header("location:uye_giris.php");
}
else
{
	echo "<center>Cikis Yaptiniz. Ana Sayfaya Yonlendiriliyorsunuz.</center>";
header("Refresh: 1; url=uye_giris.php");
}


?></div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>








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

  include("include/ustmenu.php");
  
  ?>
  <?php include("include/yanmenu.php");
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Yönetici Sayfasına Girdi','$tarihlog')");
 ?>
   
    
   
    
    

  <div class="orta">





<form action="" method="post">


    
</form> 
<?php
include("include/yoneticimenu.php");

if($_SESSION['Durum'] != 1){
        echo 'Bu sayfaya erisiminiz yok.';
		header("location:index.php");}
else{
       echo "Admin sayfasina hosgeldiniz..<br> ";}
$ad=$_SESSION['Ad'];
$soyad=$_SESSION['Soyad'];
$date= time();
$fark=$date-$_SESSION['eski'];
$dk= ($fark/60);
$sn_fark=floor($fark-(floor($dk)*60));
$saat= ($dk/60);
$dk_fark=floor($dk-(floor($saat)*60));
//kullanýcý ismini yazýrmak istiyorum.


echo '<img src="'.$_SESSION["Resim"].'"/>'." ".$_SESSION['idKullanici']." "."Hosgeldiniz". " "."<strong>".$ad. " ".$soyad ."</strong>"." ".$dk_fark.' dakika '.$sn_fark.' saniye yönetici sayfasındasınız.' ;



$_SESSION["zaman"]=date("Y-m-d G:i:s"); 
echo "Siteye giris saatiniz=".$_SESSION["zaman"]."<br>";
echo "<hr>";
echo "<strong>LOGLAR</strong>";	
echo "<hr>";
$logsec=mysql_query("Select * from log  order by idLog DESC ");	

while($logsec1=mysql_fetch_array($logsec)){
$kullanici=mysql_query("Select KullaniciAd from kullanici where idKullanici='$logsec1[idKullanici]'");
$kullanici1=mysql_fetch_array($kullanici);

echo"<table width='630'  >
 
  <tr>
    <td width='60px' >$kullanici1[KullaniciAd]</td>
    <td width='100px' >$logsec1[Sayfa]</td>
	<td width='100px' >Tarih:$logsec1[Tarih]</td>
  </tr>
  
 
</table>
<hr>
";
	
	
	
	
	}
    
    
    
?>




</div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>
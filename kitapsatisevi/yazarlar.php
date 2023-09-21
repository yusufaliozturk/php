

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
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Yazarlar Sayfasına Girdi','$tarihlog')");
 ?>
   
    
   
    
    

  <div class="orta">






<?php




echo "<strong>Yazarlar</strong>";	
echo "<hr>";
	$sayi=1;	
$yazarlar=mysql_query("Select YazarAd from kitaplar ");
while($yazarlar1=mysql_fetch_array($yazarlar)){

echo"<table width='630'  >
 
  <tr>
    <td width='20px' >$sayi</td>
    <td width='100px' ><a href='yazar_kitap_detay.php?yazarad=$yazarlar1[YazarAd]'>$yazarlar1[YazarAd]</a></td>
  </tr>
  
 
</table>
<hr>
";
	
	$sayi++;
	
	
	}
    
    
    
?>




</div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>
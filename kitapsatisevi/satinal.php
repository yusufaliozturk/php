

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gossip Kitabevi</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="disdiv">
  <?php include("include/ayar.php");
   include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  
   $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Kitap Satın aldı','$tarihlog')");
  ?>
   
    
   
    
    

  <div class="orta"><?php
  $kitap=$_GET["idkitap"];
  $tarih=date("Y-m-d G:i:s");
  $fiyat=$_GET["fiyat"];
  $adet=$_GET["adet"];
  $yeniadet=(($adet)-1);
 
if($_GET["idkitap"]){
	$satinal=mysql_query("insert into satinal(idKullanici,idKitap,Adet,Fiyat,Tarih) VALUES('$sid1','$kitap','$adet','$fiyat','$tarih')");
	 $adetdusur=mysql_query("Update kitaplar set Adet='$yeniadet' where idKitap='$kitap'");
}

  echo "Yöneticilerimiz En Kısa Sürede Sizinle İletişime Geçiçektir Beklediğiniz İçin Teşekkürler Kitaplarınız Satın Alım Tamamlandığında Yöneticiler Tarafından Silinecektir. <hr> ";

	$satin=mysql_query("Select idKitap from satinal where idKullanici='$sid1'");	
while($satin1=mysql_fetch_array($satin)){
	
	$kitapsec=mysql_query("Select * from kitaplar where idKitap='$satin1[idKitap]'");	
$kitapdizi=mysql_fetch_array($kitapsec);
echo"<table width='630' >
 
  <tr>
    <td width='50px'  >Kitap Ad :</td>
    <td width='150px' >$kitapdizi[KitapAd]</td>
	<td width='100px' >Teslimat Süresi :$kitapdizi[TedarikSuresi]</td>
    <td width='100px' >Fiyat :$kitapdizi[Fiyat]</td>
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

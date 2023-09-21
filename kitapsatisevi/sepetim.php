

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
  
   $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Sepetime Girdi','$tarihlog')");
  ?>
   
    
   
    
    

  <div class="orta"><?php
  $kitap=$_GET["kitap"];
  $tarih=date("Y-m-d G:i:s");
if($_GET["kitap"]){
	$sepeteekle=mysql_query("insert into sepetim(idKullanici,idKitap,Tarih) VALUES('$sid1','$kitap','$tarih')");
}

  
  $kullanici=mysql_query("Select * from sepetim where idKullanici='$sid1'");
while($kullanici1=mysql_fetch_array($kullanici)){
	
	
$kitapsec=mysql_query("Select * from kitaplar where idKitap='$kullanici1[idKitap]'");	
$kitapdizi=mysql_fetch_array($kitapsec)	;
echo"<table width='630' >
 
  <tr>
    <td width='55px'  >Kitap Ad :</td>
    <td width='150px' >$kitapdizi[KitapAd]</td>
	<td width='30px' >Adet:$kitapdizi[Adet]</td>
	<td width='120px' >Teslimat Süresi :$kitapdizi[TedarikSuresi]</td>
    <td width='45px' >Fiyat :$kitapdizi[Fiyat]</td>
	<td width='60px' > <a href='satinal.php?idkitap=$kitapdizi[idKitap]&adet=$kitapdizi[Adet]&fiyat=$kitapdizi[Fiyat]'>Satın al </a> </td>
	<td width='40px' > <a href='sepetsil.php?idSepet=$kullanici1[idSepet]'>Kaldır </a> </td>
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

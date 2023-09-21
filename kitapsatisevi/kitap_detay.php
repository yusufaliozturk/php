

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
  <?php include("include/yanmenu.php");?>
   
    
   
   
    

  <div class="orta"><?php
  $kitapid=$_GET['kitapid'];
  $kitapsec=mysql_query("Select * from kitaplar where idKitap='$kitapid'");

$kitapdizi=mysql_fetch_array($kitapsec);
	$eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','$kitapdizi[KitapAd]. Kitaba Girdi','$tarihlog')");
	
echo "<table width='630' align='center' >
  <tr>
    <td colspan='3' align='center'><img src=$kitapdizi[Resim] width='400' height='500' /></td>
 
  </tr>
  <tr>
    <td>Kitabın Adı</td>
	<td>:</td>
    <td>$kitapdizi[KitapAd]</td>
	
  </tr>
   <tr>
    <td>Yazarın Adı</td>
	<td>:</td>
    <td>$kitapdizi[YazarAd]</td>
	
  </tr>
   <tr>
    <td>Yayın Evi</td>
	<td>:</td>
    <td>$kitapdizi[YayinEvi]</td>
	
  </tr>
   <tr>
    <td>Basım Tarihi</td>
	<td>:</td>
    <td>$kitapdizi[BasimTarihi]</td>
	
  </tr>
   <tr>
    <td>Kitap Sayısı</td>
	<td>:</td>
    <td>$kitapdizi[Adet] Tane</td>
	
  </tr> 
   <tr>
    <td>Kitap Fiyatı</td>
	<td>:</td>
    <td>$kitapdizi[Fiyat] TL</td>
	
  </tr>
   <tr>
    <td>Teslimat Süresi</td>
	<td>:</td> 
    <td>$kitapdizi[TedarikSuresi] Gün </td>
	
  </tr>
   <tr>
    <td><a href='sepetim.php?kitap=$kitapid'>Sepete Ekle</a></td>
  </tr>
  
 </table>
<table>

<hr>
<tr>
<td>Açıklama :</td>
</tr>
 <tr >
    

    <td>$kitapdizi[Aciklama]</td>
	
  </tr>
  </table>
";
	
	
	
	
	






  ?>
  </div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

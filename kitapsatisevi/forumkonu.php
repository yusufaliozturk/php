

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
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Foruma Girdi','$tarihlog')");
  ?>
   
    
   
    
    

  <div class="orta"><?php


$konusec=mysql_query("Select * from forumkonu ");

while($konusec1=mysql_fetch_array($konusec)){
	$kulcek=mysql_query("Select KullaniciAd from kullanici where  idKullanici='$konusec1[idKullanici]' ");
	$kulcek1=mysql_fetch_array($kulcek);
	$tiklanma=mysql_query("Select * from log where Sayfa='$konusec1[Konu] Konusuna Girdi'");
$tiklanmasayi=mysql_num_rows($tiklanma);

$yorum=mysql_query("Select * from forumyorum where idKonu='$konusec1[idKonu]'");
$yorumsayi=mysql_num_rows($yorum);
echo "<table width='630' align='center' >
  
  <tr>
    

	<td width='100px' >$konusec1[Konu]</td>
	<td width='100px' >Konuyu Açan: $kulcek1[KullaniciAd]</td>
	<td width='100px' >Tarih: $konusec1[KonuTarih]</td>
	<td width='80px'>Tıklanma Sayısı:$tiklanmasayi</td>
  	<td width='60px' >Yorum Sayısı:$yorumsayi</td>
	<td width='30px' ><a href='forumyorum.php?konuid=$konusec1[idKonu]'>Giriş</a></td>
  </tr>
</table><hr>

";
}
echo' 
<form action="" method="POST">
		Yeni Konu <br/>
        <input type="text" name="konuekle"  value=""/><br />
        <input type="reset" value="Temizle"/>
        <input type="submit" value="Konu Ekle" name="konu"/></form>
';
$tarih=date("Y-m-d G:i:s");
$konu=$_POST['konuekle'];
$idkul=$_SESSION['idKullanici'];
if($_POST['konu']){
	$eklekonu=mysql_query("insert into forumkonu(idKullanici,Konu,KonuTarih) VALUES('$idkul','$konu','$tarih')");
	
header('location:forumkonu.php');	
	}

?>
		
  </div>
  
  <?php include("include/altmenu.php");?>
</div>


</body>
</html>

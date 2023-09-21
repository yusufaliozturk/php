

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
  $konuid=$_GET["konuid"];
  $konusec=mysql_query("Select Konu from forumkonu where idKonu='$konuid' ");
$konusec1=mysql_fetch_array($konusec);
$eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','$konusec1[Konu] Konusuna Girdi','$tarihlog')");

$yorumsec=mysql_query("Select * from forumyorum  where idKonu='$konuid'");
while($yorumsec1=mysql_fetch_array($yorumsec)){
	$kulcek=mysql_query("Select * from kullanici where  idKullanici='$yorumsec1[idKullanici]' ");
	$kulcek1=mysql_fetch_array($kulcek);
	
echo "<table width='630' align='center' >
<tr>
    <td width='100px' ><img src=$kulcek1[Resim] width='100' height='80' /></td>
	<td width='100px' >Yorum Yazan: <a href=yorumprofil.php?id=$kulcek1[idKullanici]>$kulcek1[KullaniciAd]</a></td>
	<td width='100px' >Tarih: $yorumsec1[YorumTarih]</td>
</tr>
<tr>
	<td>Yorum</td>
</tr>
<tr>
	<td width='100px' >$yorumsec1[Yorum]</td>
	
 </tr>
</table><hr>

";
}
echo' 
<form action="" method="POST" >
		Yeni Yorum<br/>
        <textarea  style=" height:100px; width:500px; " name="forumyorum" maxlength="255"  value="max 255 karakter"   ></textarea><br />
        <input type="reset" value="Temizle"/>
        <input type="submit" value="Yorum Ekle" name="yorum"/></form>
		Yorumunuz  Anında eklenmezse forumdan konuya tekrar giriş yapınız...
';
$tarih=date("Y-m-d G:i:s");
$yorum=$_POST['forumyorum'];
$idkul=$_SESSION['idKullanici'];
if($_POST['yorum']){
	$ekleyorum=mysql_query("insert into forumyorum(idKullanici,idKonu,Yorum,YorumTarih) VALUES('$idkul','$konuid','$yorum','$tarih')");
header('refresh:0;');
	
	}

  ?>
  </div>
 <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

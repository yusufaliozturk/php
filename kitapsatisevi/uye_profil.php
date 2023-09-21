

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
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Profiline Girdi','$tarihlog')");
  ?>
 
    
  
  <div class="orta">
  <?php 

$sid=$_SESSION["idKullanici"];
$sec=mysql_query("select * from kullanici where idKullanici='$sid'");
$bilgi=mysql_fetch_array($sec);

 	
?>
  
  <b> <h2 align="center" style="color:#000;">Kullanıcı Bilgileri</h2></b>
 
<table width="380" align="center" border="0">

      
      </table>
    <table width="380" align="center" border="0">
      <form action="" method="post" name="kayit_guncelle" enctype="multipart/form-data">
         <tr>
        <td width="356" align="left" colspan="3"><?php echo"<img src=$bilgi[Resim] width='200' height='150' />" ; ?></td>
      </tr>
      <tr>
        <td width="148">Kullanıcı Adı</td>
        <td width="10">:</td>
        <td width="208"><?php echo $bilgi['KullaniciAd']; ?></td>
      </tr>
      <tr>
        <td width="148">Ad</td>
        <td width="10">:</td>
        <td width="208"><?php echo $bilgi['Ad']; ?></td>
      </tr>
      <tr>
        <td>Soyad</td>
        <td>:</td>
        <td><?php echo $bilgi['Soyad']; ?></td>
      </tr>
       <tr>
        <td>Cinsiyet</td>
        <td>:</td>
        <td><?php echo $bilgi['Cinsiyet']; ?></td>
      </tr>
      <tr>
        <td>E-posta</td>
        <td>:</td>
        <td><?php echo $bilgi['Eposta']; ?></td>
      </tr>
      <tr>
        <td>Doğum Tarihi</td>
        <td>:</td>
        <td><?php echo $bilgi['Dtarih']; ?></td>
      </tr>
      <tr>
        <td>Doğum Yeri</td>
        <td>:</td>
        <td><?php echo $bilgi['Dyeri']; ?></td>
      </tr>
      <tr>
        <td>Öğrenim Durumu</td>
        <td>:</td>
        <td><?php echo $bilgi['OgrenimDurumu']; ?></td>
      </tr>
       <tr>
        <td>Meslek</td>
        <td>:</td>
        <td><?php echo $bilgi['Meslek']; ?></td>
      </tr>
      <tr>
        <td>İl</td>
        <td>:</td>
        <td><?php echo $bilgi['il']; ?></td>
      </tr>
       <tr>
        <td>İlçe</td>
        <td>:</td>
        <td><?php echo $bilgi['ilce']; ?></td>
      </tr>
      <tr>
        <td>Telefon</td>
        <td>:</td>
        <td><?php echo $bilgi['Gsm']; ?></td>
      </tr>
       <tr>
        <td>Gizli Soru</td>
        <td>:</td>
        <td><?php echo $bilgi['GizliSoru']; ?></td>
      </tr>
      <tr>
        <td>Gizli Cevap</td>
        <td>:</td>
        <td><?php echo $bilgi['GizliCevap']; ?></td>
      </tr>
      <tr><td><a href="uye_duzenle_form.php"> Bilgilerini Düzenle </a></td></tr>
    </table>
    </form>
    
<br/>

</div>
 
  <?php include("include/altmenu.php");?>
   

  
</div>


</body>
</html>



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
if($_SESSION['Durum'] != 1){
        echo 'Bu sayfaya erisiminiz yok.';
		header("location:index.php");}
  include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Üye Silmeye  Girdi','$tarihlog')");
 ?>
   
    
   
    
    

  <div class="orta">
  


<form action="" method="post">

    
</form> 
<?php
include("include/yoneticimenu.php");
echo "Siteye giris saatiniz=".$_SESSION["zaman"]."<br>";
echo $_SESSION['idKullanici'] .  "<br>";
echo $_SESSION["zaman"]."<br> <hr>";
//uye olanlari verileri listele
//ama kosul durumu 2 olanlar 
//durum = 1 yonetici
// durum=2   kullanici
 //veritabanindaki Onaylanmamisleri siralattim.
echo "UYE SILME <br> ";
$sorgu = mysql_query("select * from kullanici where Onay = 1 and Durum = 2 ");
while($sorgudizi= mysql_fetch_assoc($sorgu)){
    echo '<hr>';
   $kul_id = $sorgudizi['idKullanici'];
   echo '<img src="'.$sorgudizi["Resim"].'" width="75" height="75"/> <br>';
    echo "Kullanici Ad:".$sorgudizi['KullaniciAd'] . "<br>";
    echo "Uye Ad soyad:".$sorgudizi['Ad'].$sorgudizi['Soyad']. "<br>";
    echo "E- posta :".$sorgudizi['Eposta'] . "<br>";
    echo "Cinsiyet : ".$sorgudizi['Cinsiyet'] . "<br>";
    echo "Dogum Tarihi :".$sorgudizi['Dtarih'] . "<br>";
    echo "Dogum Tarihi :".$sorgudizi['Dyeri'] . "<br>";
    echo "Resim : ".$sorgudizi['Resim'] . "<br>" ;
    echo "Adres : ".$sorgudizi['Adres'] . "<br>" ;
    echo "Gsm :".$sorgudizi['Gsm'] . "<br>";
    echo "Abonelik Tarihi :".$sorgudizi['AbonelikTarih'] . "<br>";
    echo "Son Login :".$sorgudizi['SonLogin'] . "<br>";
  //header("Refresh: 1");

  
echo "<a href=\"uye_sil.php?k_id=$kul_id\" >Sil </a> <br/>";}
        $id=$_GET['k_id'];


   $sil= mysql_query("delete from kullanici WHERE idKullanici=$id " );  
   if ($sil){
       echo 'Silme başarılı :)';
       header("location:yonetici.php");
}


 ?>

  </div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>


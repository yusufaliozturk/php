

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
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','AnaSayfaya Girdi','$tarihlog')");
 ?>
   
    
   
    
    

  <div class="orta">GOSSİP Kitapevi<br/>
Bu Site İnternet Tabanlı Programlama Dersi Kapsamında <br/>
KEREM UZUN <br/>
FERAY GÜLER<br/>
MERVE RANA SARI<br/>
YUSUF ALİ ÖZTÜRK<br/>
KÜBRA BODUR<br/>
AYŞE DEMİRCİ<br/>
</div>

  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

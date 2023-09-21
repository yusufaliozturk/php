

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
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Kitap Silmeye Girdi','$tarihlog')");
 ?>
   
    
   
    
    

  <div class="orta"><?php
$sepet=$_GET["idSepet"];
  $sil= mysql_query("delete from sepetim WHERE idSepet='$sepet' ");  
   if ($sil){
       echo 'Silme başarılı ';
       header("location:sepetim.php"); }
	?>
  </div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

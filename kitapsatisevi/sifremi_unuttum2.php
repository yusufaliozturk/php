

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
  $kulid=$_GET['id'];
$gsoru=$_GET['gsoru'];
  include("include/ayar2.php");

  include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  
 ?>
   
    
   
    
    

  <div class="orta">
  <h3> Şifremi Unuttum</h3>

<form action='' name='bilgi' method='post'>
<table>
            <tr>
        <td>Gizli Soru</td>
        <td>:</td>
        <td><?php echo $gsoru;?></td>
         </tr>
         <tr>
        <td>Gizli Cevap</td>
        <td>:</td>
        <td><input type='text'  name='gcevap' value='' /></td>
      </tr>
      
      </table>
<input type='submit' name='gonder1' value='Gönder'/>
</form>

<?php

if($_POST['gonder1']){
	$ara = mysql_query("SELECT * FROM kullanici WHERE idKullanici='$kulid' ");
$sorgula = mysql_fetch_array($ara);
 $sorgula['GizliSoru'];

$sifre=$sorgula['Sifre'];
$gizlicevap=$_POST['gcevap'];

	
	if($gizlicevap==$sorgula['GizliCevap']){
		
	echo" <table>
            <tr>
        <td>Şifreniz</td>
        <td>:</td>
        <td>$sifre</td>
		<td>:</td>
		<td><a href='uye_giris.php'>Giriş Sayfası İçin Tıklayınız.</a></td>
         </tr>
         
      
      </table> ";
		
	
	
	}

}

?>
  </div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

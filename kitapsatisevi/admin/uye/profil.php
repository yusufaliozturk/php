<?php
//Oturumumuzu baþlatýyoruz
session_start();
//Veritabaný baðlantý dosyamýzý çekiyoruz
require_once("baglan.php");
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Uye Profili</title>
</head>
 
<body>
<?php
if($_SESSION['rutbe'] == 5){
    echo 'Hosgeldiniz '.$_SESSION['kulladi'].'<br>';
    echo 'Cikis yapmak icin <a href="cikis.php">tiklayin.</a>';
}else{
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
?>
</body>
</html>
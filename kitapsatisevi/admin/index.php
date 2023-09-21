<?php  
session_start();?>
<!DOCTYPE HTML>
<html>
<head>
<title>Kayıt </title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
<div class="wrap">
<!-- strat-contact-form -->	
<div class="contact-form">
<!-- start-form -->
	<form class="contact_form" action="" method="post" name="contact_form">
		<h1>Admin Girişi</h1>
	    <ul>
	        <li>
	            <input type="text"  name="kadi" placeholder="kullanıcı adı" required />
	            <span class="form_hint">Kullanıcı adınızı giriniz</span>
	             <p><img src="images/contact.png" alt=""></p>
	        </li>
	        <li>
	            <input type="password" name="sifre" class="textbox2" placeholder="sifre">
                <span class="form_hint">Şifrenizi giriniz</span>
	            <p><img src="images/lock.png" alt=""></p>
	        </li>
         </ul>
       	 	<input type="submit" name="giris" value="Sign In"/>
			
	</form>
<!-- end-form -->

<div class="clear"></div>	
</div>
<!-- end-contact-form -->
</div>
<?php 
error_reporting(0);
include("../include/ayar.php");
$kadi 	=$_POST["kadi"];
$sifre	=$_POST["sifre"];
$sorgu = mysql_query("select * from yonetici where YoneticiAd='$kadi' and Sifre='$sifre'");
$bilgi = mysql_fetch_array($sorgu);

if($_POST["giris"]){
 if($kadi==$bilgi["YoneticiAd"] and $sifre==$bilgi["Sifre"]){
	 $_SESSION["kullanici"]=$kadi;
	 echo "<img src='../img/onay.png'/> Hoşgeldiniz $kadi  sayfaya yönlendiriliyorsunuz...";
	 
	 header("refresh:1;url=adminpanel.php"); 
	 }else{
		
		 echo "<img src='../img/hata.png'/> Bilgilerinizde yanlışlık bulunmaktadır...";
		 header("refresh:1;url=index.php"); 
		 }
}
?>
</body>
</html>
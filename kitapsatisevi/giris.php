<?php include("ayar.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Üye Girişi</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		$hata=false;
		$hataMesaj;
		if(@$_SESSION["giris"] && intval($_SESSION["kulId"]) > 0)
		{
			header('Location: index.php');
		}

		if(isset($_POST['kulAdi']) && isset($_POST['sifre']))
		{
			if(!empty($_POST['kulAdi']) && !empty($_POST['sifre']))
			{
				$sql="SELECT * FROM kullanici WHERE (kulAdi='".$_POST["kulAdi"]."' OR eposta='".$_POST["kulAdi"]."') AND sifre='".$_POST["sifre"]."'";
				$result=mysql_query($sql);
				if(mysql_num_rows($result)>0)
				{
					$row=mysql_fetch_array($result);

					if($row["onay"]=="Onaylandı")
					{
						$_SESSION["giris"]=true;
						$_SESSION["kulId"]=$row["kulId"];
						$_SESSION["kulAdi"]=$row["kulAdi"];
						$_SESSION["eposta"]=$row["eposta"];
						$_SESSION["sifre"]=$row["sifre"];
						$_SESSION["adi"]=$row["adi"];
						$_SESSION["soyadi"]=$row["soyadi"];
						$_SESSION["oncekiLogin"]=$row["oncekiLogin"];
						$_SESSION["resim"]=$row["resim"];
						$_SESSION["tur"]=$row["tur"];

						$sql="UPDATE kullanici SET oncekiLogin=NOW() WHERE kulId=".$row["kulId"];
						@mysql_query($sql);

						if($row["tur"]=="Admin")
						{
							header('Location: admin/index.php');

						}
						else
						{
							header('Location: index.php');
						}
					}
					else
					{
						$hata=true;
						$hataMesaj="Hesabınız admin tarafından onaylanmamış";
					}
				}
				else
				{
					$hata=true;
					$hataMesaj="Girdiğiniz bilgiler veritabanında bulunamadı";
				}
			}
			else
			{
				$hata=true;
				$hataMesaj="Lütfen tüm alanları doldurun";
			}
		}
	?>
	<div class="pen-title">
	  <h1>Gossip Kitapevi</h1>
	</div>
	<div class="form-module">
	  <div class="form">
	    <h2>Giriş yap</h2>
	    <form action="" method="post">
	      <input type="text" name="kulAdi" placeholder="kullanıcı adı veya eposta"/>
	      <input type="password" name="sifre" placeholder="şifre"/>
	      <?php if($hata){ echo "<span>$hataMesaj</span>"; } ?>
	      <button type="submit">Giriş</button>
	    </form>
	  </div>
	  <div class="cta">
	  	<a href="sifremi_unuttum.php" class="sifremiUnuttum">Şifremi unuttum</a>
	  	<a href="kayit.php" style="float:right;">Kayıt Ol</a>
	  </div>
	</div>
</body>
</html>
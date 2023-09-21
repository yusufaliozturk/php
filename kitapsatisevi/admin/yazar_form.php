<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">

	<?php

	$yazarAdi="";
	$yazarAciklama="";

	$_SESSION["kayitHatalari"]=array();

	if(@$_POST["gonder"])
	{
		$yazarAdi=trim($_POST["yazarAdi"]);
		$yazarAciklama=trim($_POST["yazarAciklama"]);


		if(!empty($yazarAdi))
		{
			if(@$_GET["islem"]=="duzenle")
				$sql="UPDATE yazarlar
		    	SET yazarAdi='$yazarAdi', yazarAciklama='$yazarAciklama' WHERE yazarId=".$_GET["id"];
			else
				$sql="INSERT INTO yazarlar
		    	(yazarAdi, yazarAciklama) VALUES('$yazarAdi', '$yazarAciklama')";

		    if(mysql_query($sql))
		    {
		      echo "<div class='admin-basarili-mesaj'>İşleminiz başarıyla tamamlandı...</div>";
		    }
		    else
		    {
		      echo "<div class='admin-basarisiz-mesaj'>Hata oluştu. Hata: ".mysql_error()."</div>";   
		    }
		}
		else
		{
			$_SESSION["kayitHatalari"]["yazarAdi"]="Yazar adı boş bırakılamaz.";
		}
	}
	else if(@$_GET["islem"]=="duzenle")
	{
		$sql="SELECT * FROM yazarlar WHERE yazarId=".$_GET["id"];
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		$yazarAdi=$row["yazarAdi"];
		$yazarAciklama=$row["yazarAciklama"];
	}

  ?>
  <form enctype="multipart/form-data" action="" method="post" name="uyeKayitFormu">
    <table>
    	<tr>
			<td>Yazar Adı*</td>
    		<td>
    			<input type="text" class="kutular" name="yazarAdi" value="<?php echo $yazarAdi; ?>" />
    			<?php
		            if (@array_key_exists('yazarAdi', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["yazarAdi"]; ?></span>
	          	<?php } ?>
    			</td>
    	</tr>
    	<tr>
    		<td>Yazar Açıklama</td>
    		<td>
    			<textarea name="yazarAciklama"><?php echo $yazarAciklama; ?></textarea>
			</td>
    	</tr>
		<tr>
			<td colspan="3" align="right">
			  <input type="reset" value="Temizle">
			  <input type="submit" name="gonder" value="Kaydet">
			</td>
		</tr>
    </table>
  </form>
</div>
	
<?php include('sablon/alt.php'); ?>
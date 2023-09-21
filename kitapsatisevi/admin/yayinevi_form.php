<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">

	<?php

	$yayineviAdi="";
	$yayineviAciklama="";

	$_SESSION["kayitHatalari"]=array();

	if(@$_POST["gonder"])
	{
		$yayineviAdi=trim($_POST["yayineviAdi"]);
		$yayineviAciklama=trim($_POST["yayineviAciklama"]);


		if(!empty($yayineviAdi))
		{
			if(@$_GET["islem"]=="duzenle")
				$sql="UPDATE yayinevleri
		    	SET yayineviAdi='$yayineviAdi', yayineviAciklama='$yayineviAciklama' WHERE yayineviId=".$_GET["id"];
			else
				$sql="INSERT INTO yayinevleri
		    	(yayineviAdi, yayineviAciklama) VALUES('$yayineviAdi', '$yayineviAciklama')";

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
			$_SESSION["kayitHatalari"]["yayineviAdi"]="Yayınevi adı boş bırakılamaz.";
		}
	}
	else if(@$_GET["islem"]=="duzenle")
	{
		$sql="SELECT * FROM yayinevleri WHERE yayineviId=".$_GET["id"];
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		$yayineviAdi=$row["yayineviAdi"];
		$yayineviAciklama=$row["yayineviAciklama"];
	}

  ?>
  <form enctype="multipart/form-data" action="" method="post" name="uyeKayitFormu">
    <table>
    	<tr>
			<td>Yayınevi Adı*</td>
    		<td>
    			<input type="text" class="kutular" name="yayineviAdi" value="<?php echo $yayineviAdi; ?>" />
    			<?php
		            if (@array_key_exists('yayineviAdi', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["yayineviAdi"]; ?></span>
	          	<?php } ?>
    			</td>
    	</tr>
    	<tr>
    		<td>Yayınevi Açıklama</td>
    		<td>
    			<textarea name="yayineviAciklama"><?php echo $yayineviAciklama; ?></textarea>
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
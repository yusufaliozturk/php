<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">

	<?php

	$kategoriAdi="";

	$_SESSION["kayitHatalari"]=array();

	if(@$_POST["gonder"])
	{
		$kategoriAdi=trim($_POST["kategoriAdi"]);


		if(!empty($kategoriAdi))
		{
			if(@$_GET["islem"]=="duzenle")
				$sql="UPDATE kategoriler
		    	SET kategoriAdi='$kategoriAdi' WHERE kategoriId=".$_GET["id"];
			else
				$sql="INSERT INTO kategoriler
		    	(kategoriAdi) VALUES('$kategoriAdi')";

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
			$_SESSION["kayitHatalari"]["kategoriAdi"]="Kategori adı boş bırakılamaz.";
		}
	}
	else if(@$_GET["islem"]=="duzenle")
	{
		$sql="SELECT * FROM kategoriler WHERE kategoriId=".$_GET["id"];
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		$kategoriAdi=$row["kategoriAdi"];
	}

  ?>
  <form enctype="multipart/form-data" action="" method="post" name="uyeKayitFormu">
    <table>
    	<tr>
			<td>Kategori Adı*</td>
    		<td>
    			<input type="text" class="kutular" name="kategoriAdi" value="<?php echo $kategoriAdi; ?>" />
    			<?php
		            if (@array_key_exists('kategoriAdi', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["kategoriAdi"]; ?></span>
	          	<?php } ?>
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
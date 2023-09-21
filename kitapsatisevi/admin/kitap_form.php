<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">

	<?php

	$kitapAdi="";
	$kitapOzet="";
	$baskiSayisi="";
	$tedarikSuresi="";
	$yazarId="";
	$kategoriId="";
	$yayineviId="";
	$fiyat="";
	$resim="img/kitap.png";

	$_SESSION["kayitHatalari"]=array();

	if(@$_POST["gonder"])
	{
		$kitapAdi=trim($_POST["kitapAdi"]);
		$kitapOzet=trim($_POST["kitapOzet"]);
		$baskiSayisi=trim($_POST["baskiSayisi"]);
		$tedarikSuresi=trim($_POST["tedarikSuresi"]);
		$yazarId=$_POST["yazarlar"];
		$kategoriId=$_POST["kategoriler"];
		$yayineviId=$_POST["yayinevleri"];
		$fiyat=trim($_POST["fiyat"]);


		if(!empty($kitapAdi) && !empty($baskiSayisi) && !empty($tedarikSuresi) && !empty($yazarId) && !empty($kategoriId) && !empty($yayineviId) && !empty($fiyat))
		{

			if($_FILES["resim"]["name"]<>"")
			{
			  include("../uploads/class.upload.php");
			  $handle = new upload($_FILES['resim'], 'tr_TR');
			  if ($handle->uploaded)
			  {
			    $handle->file_auto_rename = true;
			    $handle->allowed = array('image/*');
			    $handle->image_text            = 'Gossip';
			    $handle->image_text_color      = '#000000';
			    $handle->image_text_opacity    = 80;
			    $handle->image_text_background = '#FFFFFF';
			    $handle->image_text_background_opacity = 70;
			    $handle->image_text_font       = 5;
			    $handle->image_text_padding    = 20;
			    $handle->process('../uploads/');
			    if ($handle->processed) {
			      $resim="uploads/".$handle->file_src_name;
			      $handle->clean();

			    }
			    else
			    {
			      echo 'Resim yüklerken hata oluştu. Hata:  ' . $handle->error;
			    }
			  }
			}
			else
			{
				$resim=$_POST["eskiresim"];
			}

			if(@$_GET["islem"]=="duzenle")
				$sql="UPDATE kitaplar
		    	SET kitapAdi='$kitapAdi', kitapOzet='$kitapOzet', baskiSayisi='$baskiSayisi', tedarikSuresi='$tedarikSuresi', yazarId='$yazarId', yayineviId='$yayineviId', kategoriId='$kategoriId', kitapResim='$resim', fiyat='$fiyat' WHERE kitapId=".$_GET["id"];
			else
				$sql="INSERT INTO kitaplar
		    	(kitapAdi, kitapOzet, baskiSayisi, tedarikSuresi, yazarId, yayineviId, kategoriId, eklenmeTarihi, kitapResim, fiyat, satilma) VALUES('$kitapAdi','$kitapOzet','$baskiSayisi','$tedarikSuresi','$yazarId','$yayineviId','$kategoriId', NOW(), '$resim','$fiyat', 0)";

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

			if(empty($kitapAdi))
			{
				$_SESSION["kayitHatalari"]["kitapAdi"]="Kitap adı boş bırakılamaz.";
			}

			if(empty($baskiSayisi))
			{
				$_SESSION["kayitHatalari"]["baskiSayisi"]="Baskı alanı boş bırakılamaz.";
			}

			if(empty($tedarikSuresi))
			{
				$_SESSION["kayitHatalari"]["tedarikSuresi"]="Tedarik süresi alanı boş bırakılamaz.";
			}

			if(empty($fiyat))
			{
				$_SESSION["kayitHatalari"]["fiyat"]="Fiyat alanı boş bırakılamaz.";
			}

			if(empty($yazarId))
			{
				$_SESSION["kayitHatalari"]["yazarId"]="Kitabın yazarı boş bırakılamaz. Yeni yazar oluşturduktan sonra kitap oluşturabilirsiniz.";
			}

			if(empty($kategoriId))
			{
				$_SESSION["kayitHatalari"]["kategoriId"]="Kitabın kategorisi boş bırakılamaz. Yeni kategori oluşturduktan sonra kitap oluşturabilirsiniz.";
			}

			if(empty($yayineviId))
			{
				$_SESSION["kayitHatalari"]["yayineviId"]="Kitabın yayınevi boş bırakılamaz. Yeni yayınevi oluşturduktan sonra kitap oluşturabilirsiniz.";
			}
		}
	}
	else if(@$_GET["islem"]=="duzenle")
	{
		$sql="SELECT * FROM kitaplar, kategoriler, yayinevleri, yazarlar WHERE kategoriler.kategoriId=kitaplar.kategoriId AND yayinevleri.yayineviId=kitaplar.yayineviId AND yazarlar.yazarId=kitaplar.yazarId AND kitapId=".$_GET["id"];
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		$kitapAdi=$row["kitapAdi"];
		$kitapOzet=$row["kitapOzet"];
		$baskiSayisi=$row["baskiSayisi"];
		$tedarikSuresi=$row["tedarikSuresi"];
		$yazarId=$row["yazarId"];
		$kategoriId=$row["kategoriId"];
		$yayineviId=$row["yayineviId"];
		$fiyat=$row["fiyat"];
		$resim=$row["kitapResim"];
	}

  ?>
  <form enctype="multipart/form-data" action="" method="post" name="uyeKayitFormu">
    <table>
    	<tr>
			<td>Kitap Adı*</td>
    		<td>
    			<input type="text" class="kutular" name="kitapAdi" value="<?php echo $kitapAdi; ?>" />
    			<?php
		            if (@array_key_exists('kitapAdi', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["kitapAdi"]; ?></span>
	          	<?php } ?>
    			</td>
    	</tr>
    	<tr>
    		<td>Kitap Özeti</td>
    		<td>
    			<textarea name="kitapOzet"><?php echo $kitapOzet; ?></textarea>
			</td>
    	</tr>
    	<tr>
			<td>Baskı Sayısı*</td>
    		<td>
    			<input type="text" class="kutular" name="baskiSayisi" value="<?php echo $baskiSayisi; ?>" />
    			<?php
		            if (@array_key_exists('baskiSayisi', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["baskiSayisi"]; ?></span>
	          	<?php } ?>
			</td>
    	</tr>
    	<tr>
			<td>Tedarik Süresi*</td>
    		<td>
    			<input type="text" class="kutular" name="tedarikSuresi" value="<?php echo $tedarikSuresi; ?>" />
    			<?php
		            if (@array_key_exists('tedarikSuresi', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["tedarikSuresi"]; ?></span>
	          	<?php } ?>
    		</td>
    	</tr>
    	<tr>
    		<td>Yazarı*</td>
    		<td>	
    			<?php
    				$sqlYazar="SELECT * FROM yazarlar ORDER BY yazarAdi ASC";
    				$resultYazar=mysql_query($sqlYazar);
    				echo "<select name='yazarlar'>";
    				while($rowYazar=mysql_fetch_array($resultYazar))
    				{
    					if($rowYazar["yazarId"]==$yazarId)
    						echo "<option value='".$rowYazar["yazarId"]."' selected='selected'>".$rowYazar["yazarAdi"]."</option>";
    					else
    						echo "<option value='".$rowYazar["yazarId"]."'>".$rowYazar["yazarAdi"]."</option>";
    				}
    				echo "</select>";

		            if (@array_key_exists('yazarId', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["yazarId"]; ?></span>
	          	<?php } ?>
    		</td>
    	</tr>
    	<tr>
    		<td>Kategori*</td>
    		<td>	
    			<?php
    				$sqlKategori="SELECT * FROM kategoriler ORDER BY kategoriAdi ASC";
    				$resultKategori=mysql_query($sqlKategori);
    				echo "<select name='kategoriler'>";
    				while($rowKategori=mysql_fetch_array($resultKategori))
    				{
    					if($rowKategori["kategoriId"]==$kategoriId)
    						echo "<option value='".$rowKategori["kategoriId"]."' selected='selected'>".$rowKategori["kategoriAdi"]."</option>";
    					else
    						echo "<option value='".$rowKategori["kategoriId"]."'>".$rowKategori["kategoriAdi"]."</option>";
    				}
    				echo "</select>";

		            if (@array_key_exists('kategoriId', $_SESSION["kayitHatalari"]))
		            { ?>
		            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["kategoriId"]; ?></span>
	          	<?php } ?>
    		</td>
    	</tr>
    	<tr>
    		<td>Yayın Evi*</td>
    		<td>	
    			<?php
    				$sqlYayinevleri="SELECT * FROM yayinevleri ORDER BY yayineviAdi ASC";
    				$resultYayinevleri=mysql_query($sqlYayinevleri);
    				echo "<select name='yayinevleri'>";
    				while($rowYayinevleri=mysql_fetch_array($resultYayinevleri))
    				{
    					if($rowYayinevleri["yayineviId"]==$yayineviId)
    						echo "<option value='".$rowYayinevleri["yayineviId"]."' selected='selected'>".$rowYayinevleri["yayineviAdi"]."</option>";
    					else
    						echo "<option value='".$rowYayinevleri["yayineviId"]."'>".$rowYayinevleri["yayineviAdi"]."</option>";
    				}
    				echo "</select>";

	    			if (@array_key_exists('yayineviId', $_SESSION["kayitHatalari"]))
			            { ?>
			            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["yayineviId"]; ?></span>
		          	<?php } ?>
    		</td>
    	</tr>
		<tr>
			<td>Fiyatı</td>
			<td>
				<input type="number" min="0" class="kutular" name="fiyat" value="<?php echo $fiyat; ?>" />
				<?php
				if (@array_key_exists('fiyat', $_SESSION["kayitHatalari"]))
	            { ?>
	            	<span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["fiyat"]; ?></span>
          		<?php } ?>
			</td>
		</tr>
		<tr>
			<td>Kitap Resmi</td>
			<td>
				<img src="<?php echo "../".$resim; ?>" width="128" height="128" style="display: block;">
				<p style="padding:20px 0; color:red;">Not: Yeni resim yüklemezseniz geçerli resim kalacaktır.</p>
				<input type="file" name="resim">
				<input type="hidden" name="eskiresim" value="<?php echo $resim; ?>">
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
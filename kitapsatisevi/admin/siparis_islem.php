<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">
	<?php

	if(@$_GET["islem"]=="onayla" || @$_GET["islem"]=="onaykaldir")
	{
		if($_GET["islem"]=="onayla")
		{
			$onayIslem="Onaylandı";
			$adetIslem="topla";
		}
		else
		{
			$onayIslem="Onaylanmadı";
			$adetIslem="cikar";
		}

		// Onay işlemi yapıldığında kitap tablosundan satilma alanını değiştirme yapılıyor....
		$sqlKitapBak="SELECT kitapId, adet FROM sepet WHERE siparisId=".$_GET["id"];
		$resultBak=mysql_query($sqlKitapBak);
		while($rowKitapBak=mysql_fetch_array($resultBak))
		{
			if($adetIslem=="topla")
				mysql_query("UPDATE kitaplar SET satilma = satilma + ".$rowKitapBak["adet"]." WHERE kitapId=".$rowKitapBak["kitapId"]);
			else
				mysql_query("UPDATE kitaplar SET satilma = satilma - ".$rowKitapBak["adet"]." WHERE kitapId=".$rowKitapBak["kitapId"]);
		}
		// Bitti

		$sql="UPDATE siparis SET siparisOnay='".$onayIslem."' WHERE siparisId=".$_GET["id"];

		if(mysql_query($sql))
		{
			echo "<div class='admin-basarili-mesaj'>Onay işlemi başarıyla gerçekleşti</div>";
		}
		else
		{
			echo "<div class='admin-basarisiz-mesaj'>Onay işlemi yapılırken hata oluştu</div>";
		}
	}

	?>
	<table>
		<thead>
			<tr>
				<th>Sipariş Veren Ad Soyadı</th>
				<th>Detay</th>
				<th>Onay Durumu</th>
				<th>İşlem</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql="SELECT * FROM siparis ORDER BY tarih DESC";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
				{
					$sqlDetay="SELECT * FROM sepet, kullanici WHERE kullanici.kulId=sepet.kulID AND siparisId=".$row["siparisId"];
					$resultDetay=mysql_query($sqlDetay);
					$toplamAdet=0;
					$toplamTutar=0;
					$farkliKitap=mysql_num_rows($resultDetay);
					while($rowDetay=mysql_fetch_array($resultDetay))
					{
						$toplamAdet+=$rowDetay["adet"];
						$toplamTutar+=($rowDetay["adet"] * $rowDetay["fiyat"]);
						$adSoyad=$rowDetay["adi"]." ".$rowDetay["soyadi"];
					}

					?>
					
					<tr>
						<td><?php echo $adSoyad; ?></td>
						<td><?php echo $farkliKitap." farklı kitaptan toplam ".$toplamAdet." kitap satın almış olup sipariş tutarı ".$toplamTutar." &#x20BA; dir."; ?></td>
						<td style="<?php if($row['siparisOnay']=='Onaylanmadı'){ echo 'background:red;'; }else{ echo 'background:green;'; } ?>">

							<?php
								if($row["siparisOnay"]=='Onaylanmadı')
								{
									$onay="onayla";
								} 
								else
								{
									$onay="onaykaldir";
								}
							?>
							<a href="siparis_islem.php?islem=<?php echo $onay; ?>&id=<?php echo $row['siparisId']; ?>">Onay</a>
						</td>
						<td>
							<a href="siparis_form.php?islem=duzenle&id=<?php echo $row["siparisId"]; ?>">Düzenle</a>
						</td>
					</tr>

				<?php } ?>
		</tbody>
	</table>
</div>
	
<?php include('sablon/alt.php'); ?>
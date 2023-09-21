<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">
	<?php
		if(@$_GET["islem"]=="sil")
		{
			$sql="DELETE FROM kitaplar WHERE kitapId=".$_GET["id"];
			if(mysql_query($sql))
			{
				echo "<h2 style='background:green; padding: 10px; margin: 0 0 10px 0;'>Silme işlemi başarıyla gerçekleşti</h2>";
			}
			else
			{
				echo "<h2 style='background: red; padding: 10px; margin: 0 0 10px 0;'>Silme işlemi yapılırken hata oluştu</h2>";
			}
		}
		?>
		<div class="admin-panel-baslik">
			<a href="kitap_form.php">Yeni Kitap</a>
		</div>
		<table>
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Kitap Adı</th>
		            <th>Baskı Sayısı</th>
		            <th>Tedarik Süresi</th>
		            <th>Yazar</th>
		            <th>Kategori</th>
		            <th>Yayın Evi</th>
		            <th>Fiyat</th>
		            <th>Eklenme Tarihi</th>
		            <th>İşlemler</th>
		        </tr>
		    </thead>

		    <tbody>
				<?php
					$sql="SELECT * FROM kitaplar, kategoriler, yayinevleri, yazarlar WHERE kategoriler.kategoriId=kitaplar.kategoriId AND yayinevleri.yayineviId=kitaplar.yayineviId AND yazarlar.yazarId=kitaplar.yazarId ORDER BY kitaplar.eklenmeTarihi DESC";
					$result=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_array($result))
					{
						$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["kitapAdi"]; ?></td>
							<td><?php echo $row["baskiSayisi"]; ?></td>
							<td><?php echo $row["tedarikSuresi"]; ?></td>
							<td><?php echo $row["yazarAdi"]; ?></td>
							<td><?php echo $row["kategoriAdi"]; ?></td>
							<td><?php echo $row["yayineviAdi"]; ?></td>
							<td><?php echo $row["fiyat"]; ?></td>
							<td>
								<?php
									$phpTarih = strtotime($row["eklenmeTarihi"]);
									$phpTarihGosterim = date("d.m.Y H:i:s", $phpTarih);
									echo $phpTarihGosterim; 
								?>
							</td>
							<td>
								<a href="kitap_form.php?islem=duzenle&id=<?php echo $row['kitapId']; ?>">Düzenle</a>
								<a href="kitap_islem.php?islem=sil&id=<?php echo $row['kitapId']; ?>">Sil</a>
							</td>
						</tr>
						<?php
					}
				?>
		    </tbody>
		</table>
</div>
	
<?php include('sablon/alt.php'); ?>
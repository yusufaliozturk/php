<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">
	<?php
		if(@$_GET["islem"]=="onayla" || @$_GET["islem"]=="onaykaldir")
		{
			if($_GET["islem"]=="onayla")
			{
				$onayIslem="Onaylandı";
			}
			else
			{
				$onayIslem="Onaylanmadı";
			}

			$sql="UPDATE kullanici SET onay='".$onayIslem."' WHERE kulId=".$_GET["id"];
			if(mysql_query($sql))
			{
				echo "<div class='admin-basarili-mesaj'>Onay işlemi başarıyla gerçekleşti</div>";
			}
			else
			{
				echo "<div class='admin-basarisiz-mesaj'>Onay işlemi yapılırken hata oluştu</div>";
			}
		}
		else if(@$_GET["islem"]=="sil")
		{
			$sql="DELETE FROM kullanici WHERE kulId=".$_GET["id"];
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
			<a href="uye_form.php">Yeni Kullanıcı</a>
		</div>
		<table>
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Kullanıcı Adı</th>
		            <th>Eposta</th>
		            <th>Adi</th>
		            <th>Soyadi</th>
		            <th>Cinsiyet</th>
		            <th>Tel</th>
		            <th>Öğrenim Durumu</th>
		            <th>Son Giriş Tarihi</th>
		            <th>Tür</th>
		            <th>Onay Durumu</th>
		            <th>İşlemler</th>
		        </tr>
		    </thead>

		    <tbody>
				<?php
					$sql="SELECT * FROM kullanici";
					$result=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_array($result))
					{
						$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["kulAdi"]; ?></td>
							<td><?php echo $row["eposta"]; ?></td>
							<td><?php echo $row["adi"]; ?></td>
							<td><?php echo $row["soyadi"]; ?></td>
							<td><?php echo $row["cinsiyet"]; ?></td>
							<td><?php echo $row["tel"]; ?></td>
							<td><?php echo $row["ogrenimDurumu"]; ?></td>
							<td>
								<?php
									if($row["oncekiLogin"]<>"0000-00-00 00:00:00")
									{
										$phpTarih = strtotime($row["oncekiLogin"]);
										$phpTarihGosterim = date("d.m.Y H:i:s", $phpTarih);
										echo $phpTarihGosterim; 
									}
									else
									{
										echo "<span style='display:block; background:red'>Giriş yapmamış</span>";
									}
								?>
							</td>
							<td><?php echo $row["tur"]; ?></td>
							<td style="<?php if($row['onay']=='Onaylanmadı'){ echo 'background:red'; }else{ echo 'background:green'; } ?>">
								<?php
									if($row["onay"]=='Onaylanmadı')
									{
										$onay="onayla";
									} 
									else
									{
										$onay="onaykaldir";
									}
								?>
								<a href="uyelik_islem.php?islem=<?php echo $onay; ?>&id=<?php  echo $row['kulId']; ?>">Onay</a>
							</td>
							<td>
								<a href="uye_form.php?islem=duzenle&id=<?php echo $row['kulId']; ?>">Düzenle</a>
								<a href="uyelik_islem.php?islem=sil&id=<?php echo $row['kulId']; ?>">Sil</a>
							</td>
						</tr>
						<?php
					}
				?>
		    </tbody>
		</table>
</div>
	
<?php include('sablon/alt.php'); ?>
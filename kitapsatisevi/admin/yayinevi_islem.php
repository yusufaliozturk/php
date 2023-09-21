<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">
	<?php
		if(@$_GET["islem"]=="sil")
		{
			$sql="DELETE FROM yayinevleri WHERE yayineviId=".$_GET["id"];
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
			<a href="yayinevi_form.php">Yeni Yayınevi</a>
		</div>
		<table>
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Yayınevi Adı</th>
		            <th>İşlemler</th>
		        </tr>
		    </thead>

		    <tbody>
				<?php
					$sql="SELECT * FROM yayinevleri ORDER BY yayineviAdi ASC";
					$result=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_array($result))
					{
						$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["yayineviAdi"]; ?></td>
							<td>
								<a href="yayinevi_form.php?islem=duzenle&id=<?php echo $row['yayineviId']; ?>">Düzenle</a>
								<a href="yayinevi_islem.php?islem=sil&id=<?php echo $row['yayineviId']; ?>">Sil</a>
							</td>
						</tr>
						<?php
					}
				?>
		    </tbody>
		</table>
</div>
	
<?php include('sablon/alt.php'); ?>
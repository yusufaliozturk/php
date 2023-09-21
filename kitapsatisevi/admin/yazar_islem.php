<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">
	<?php
		if(@$_GET["islem"]=="sil")
		{
			$sql="DELETE FROM yazarlar WHERE yazarId=".$_GET["id"];
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
			<a href="yazar_form.php">Yeni Yazar</a>
		</div>
		<table>
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Yazar Adı</th>
		            <th>İşlemler</th>
		        </tr>
		    </thead>

		    <tbody>
				<?php
					$sql="SELECT * FROM yazarlar ORDER BY yazarAdi ASC";
					$result=mysql_query($sql);
					$i=0;
					while($row=mysql_fetch_array($result))
					{
						$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["yazarAdi"]; ?></td>
							<td>
								<a href="yazar_form.php?islem=duzenle&id=<?php echo $row['yazarId']; ?>">Düzenle</a>
								<a href="yazar_islem.php?islem=sil&id=<?php echo $row['yazarId']; ?>">Sil</a>
							</td>
						</tr>
						<?php
					}
				?>
		    </tbody>
		</table>
</div>
	
<?php include('sablon/alt.php'); ?>
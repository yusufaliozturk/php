<?php include('sablon/ust.php'); ?>

<?php include('sablon/menu.php'); ?>

<?php include('sablon/sol.php'); ?>
    
  <div class="orta">
    <?php
    	if(@$_GET["islem"]=="satinal")
    	{
    		$sqlSiparis="INSERT INTO siparis(kulId, siparisAciklama, siparisOnay, tarih) VALUES(".$_SESSION["kulId"].", '', 'Onaylanmadı', NOW())";
    		if(mysql_query($sqlSiparis))
    		{
    			$siparisId=mysql_insert_id();
    			$sqlSepet="UPDATE sepet SET siparisId=".$siparisId." WHERE kulId=".$_SESSION["kulId"]." AND siparisId=0";
    			mysql_query($sqlSepet);
    			sayfaRaporEt($_SESSION["kulId"],'Sepetindeki ürünleri satın alıp siparişe dönüştürdü.');
    			header('Location: '.$_SERVER['PHP_SELF']);
    		}

    	}

    	sayfaRaporEt($_SESSION["kulId"],'Sipariş sayfasına girdi.');
    	$sql="SELECT * FROM siparis WHERE siparis.kulId=".$_SESSION["kulId"]." ORDER BY tarih DESC";
    	$result=mysql_query($sql);
    	if(mysql_num_rows($result) < 1)
		{
			echo "<p style='font-size:30px; font-weight: bold; text-align: center; margin-top: 50px;'>Siparişiniz bulunmamaktadır.</p>";
		}
		else
		{
	    	?>
	    	<p style="background-color: #008CBA; color:#FFF; font-size:20px; text-align: center; font-weight: bold;margin-bottom:10px; padding: 10px;">Siparişlerim</p>
			
			<?php
			while($row=mysql_fetch_array($result))
			{
				?>
				<table style="margin-bottom:20px;" class="sepetTablo">
					<tr>
						<th>Onay Durumu</th>
						<th>Tarih</th>
						<th colspan="2">Aciklama</th>
					</tr>
					<tr style="<?php if($row['siparisOnay']=='Onaylanmadı'){ echo 'background:red;'; }else{ echo 'background:green;'; } ?>">
						<td><?php echo $row["siparisOnay"]; ?></td>
						<td>
							<?php
								$phpTarih = strtotime($row["tarih"]);
								$phpTarihGosterim = date("d.m.Y H:i:s", $phpTarih);
								echo $phpTarihGosterim; 
							?>
						</td>
						<td colspan="2"><?php echo $row["siparisAciklama"]; ?></td>
					</tr>
					<tr>
						<th colspan="4">Sipariş Sepetiniz</th>
					</tr>
					<?php

					$sqlSepet="SELECT * FROM sepet, kitaplar WHERE kitaplar.kitapId=sepet.kitapId AND kulId=".$_SESSION["kulId"]." AND siparisId=".$row["siparisId"];
					$resultSepet=mysql_query($sqlSepet);
					$toplamTutar=0;
					while($rowSepet=mysql_fetch_array($resultSepet))
					{
						$tutar=$rowSepet["adet"] * $rowSepet["fiyat"];
						$toplamTutar+=$tutar;
						echo "<tr>";
						echo "<td>".$rowSepet["kitapAdi"]."</td>";
						echo "<td>".$rowSepet["adet"]."</td>";
						echo "<td>".$rowSepet["fiyat"]."</td>";
						echo "<td>".$tutar."</td>";
						echo "</tr>";
					}

					?>

					<tr>
			    		<td colspan="4" style="text-align: right;">
			    			Toplam Tutar: <b><?php echo $toplamTutar; ?></b>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td colspan="4" style="text-align: right;">
			    			Siparişle ilgili bir sorun mu yaşıyorsun? <a href="#">Admine mesaj gönder</a>
			    		</td>
			    	</tr>
		    	</table>

	  		<?php }
    	
		} ?>
  </div>

<?php include('sablon/alt.php'); ?>
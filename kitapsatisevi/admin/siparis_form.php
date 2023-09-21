<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">
	<?php

	if(@$_POST["gonder"])
	{
		$sqlDuzenle="UPDATE siparis SET siparisAciklama='".$_POST["siparisAciklama"]."' WHERE siparisId=".$_GET["id"];

		if(mysql_query($sqlDuzenle))
		{
			echo "<div class='admin-basarili-mesaj'>Sipariş başarıyla güncellendi.</div>";
		}
		else
		{
			echo "<div class='admin-basarisiz-mesaj'>Sipariş güncellenemedi. Hata oluştu.</div>";
		}
	}

	if($_GET["islem"]=="kitapsil")
	{
		$sql="DELETE FROM sepet WHERE siparisId=".$_GET["id"]." AND kitapId=".$_GET["kitapId"];
		if(mysql_query($sql))
		{
			echo "<div class='admin-basarili-mesaj'>Sepetten kitap başarıyla silindi.</div>";
		}
		else
		{
			echo "<div class='admin-basarisiz-mesaj'>Sepetten kitap silinemedi. Hata oluştu.</div>";
		}
	}

	$sql="SELECT * FROM siparis WHERE siparisId=".$_GET["id"];
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

	?>

	<table>
		<thead>
			<tr>
				<th colspan="5" align="center">Sipariş Sepeti</th>
			</tr>
			<tr>
	    		<th>Kitap Adı</th>
	    		<th><b>Adet</b></th>
	    		<th><b>Fiyat</b></th>
	    		<th><b>Tutar</b></th>
	    		<th><b>İşlem</b></th>
	    	</tr>
		</thead>
		<tbody>
	    	<?php
			
			$sqlSepet="SELECT * FROM sepet, kitaplar WHERE kitaplar.kitapId=sepet.kitapId AND siparisId=".$_GET["id"];
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
				echo "<td><a href='siparis_form.php?islem=kitapsil&id=".$_GET["id"]."&kitapId=".$rowSepet["kitapId"]."'>Sepetten Çıkar</a></td>";
				echo "</tr>";

			} 

	    	?>

	    	<tr>
	    		<td colspan="5">
	    			Toplam Tutar: <b><?php echo $toplamTutar; ?></b>
	    		</td>
	    	</tr>
		</tbody>
    </table>

    <form action="" method="post" style="margin-top:20px;">
    	<p style="margin-bottom:10px; font-size:18px;">Sipariş Açıklaması</p>
    	<textarea name="siparisAciklama" style="width:98%; height:50px;"><?php echo $row["siparisAciklama"]; ?></textarea>
    	<input type="submit" name="gonder" value="Kaydet" style="padding:20px; margin: 10px 15px; float:right; width:120px;">
    </form>
</div>
	
<?php include('sablon/alt.php'); ?>
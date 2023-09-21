<?php include('sablon/ust.php'); ?>

<?php include('sablon/menu.php'); ?>

<?php include('sablon/sol.php'); ?>
    
  <div class="orta">
    	<?php
            $_SESSION["kitapId"]=$_GET["id"];

            if(@$_POST["gonder"])
            {
                if(!empty($_POST["yorum"]))
                {
                    $sqlKaydet="INSERT INTO kitapyorum(kulId, kitapId, yorum, tarih) VALUES('".$_SESSION["kulId"]."','".$_SESSION["kitapId"]."','".$_POST["yorum"]."',NOW())";
                    mysql_query($sqlKaydet);
                }
            }

    		$sql="SELECT * FROM kitaplar, kategoriler, yayinevleri, yazarlar WHERE kategoriler.kategoriId=kitaplar.kategoriId AND yayinevleri.yayineviId=kitaplar.yayineviId AND yazarlar.yazarId=kitaplar.yazarId AND kitaplar.kitapId=".$_GET["id"];
    		$result=mysql_query($sql);
    		$row=mysql_fetch_array($result);
            sayfaRaporEt($_SESSION["kulId"], $row["kitapAdi"].' adlı kitabın sayfasına girdi.');
        ?>
        <table class="kitapIcerikTablo">
            <tr>
                <td colspan="2" align="center">
                    <img src="<?php echo $row["kitapResim"]; ?>" width="128" height="128">
                </td>
            </tr>
            <tr>
                <td>Kitap Adı</td>
                <td><?php echo $row["kitapAdi"]; ?></td>
            </tr>
            <tr>
                <td>Kitap Özeti</td>
                <td><?php echo $row["kitapOzet"]; ?></td>
            </tr>
            <tr>
                <td>Baskı Bilgisi</td>
                <td><?php echo $row["baskiSayisi"]; ?></td>
            </tr>
            <tr>
                <td>Tedarik Süresi</td>
                <td><?php echo $row["tedarikSuresi"]; ?></td>
            </tr>
            <tr>
                <td>Yazar</td>
                <td><?php echo $row["yazarAdi"]; ?></td>
            </tr><tr>
                <td>Kategori</td>
                <td><?php echo $row["kategoriAdi"]; ?></td>
            </tr>
            <tr>
                <td>Yayın Evi</td>
                <td><?php echo $row["yayineviAdi"]; ?></td>
            </tr>
            <tr>
                <td>Satılma Sayısı</td>
                <td><?php echo $row["satilma"]; ?></td>
            </tr>
            <tr>
                <td>Fiyat</td>
                <td><?php echo $row["fiyat"]; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <a href="sepetim.php?islem=kitapekle&kitapId=<?php echo $row['kitapId']; ?>">Sepete Ekle</a>
                </td>
            </tr>
        </table>

        <div class="kitapYorum">
            <h1>Kitaba Yapılan Yorumlar</h1>
            <ul>
                <?php
                    $sqlYorumlar="SELECT * FROM kitapyorum, kullanici WHERE kullanici.kulId=kitapyorum.kulId AND kitapId=".$_SESSION["kitapId"]." ORDER BY tarih DESC";
                    $resultYorumlar=mysql_query($sqlYorumlar);
                    while($rowYorumlar=mysql_fetch_array($resultYorumlar))
                    {
                        ?>
                        <li>
                            <p>
                                <span>Yazan:<?php echo $rowYorumlar["adi"]." ".$rowYorumlar["soyadi"]; ?></span>
                                <span class="sag">
                                    Tarih:
                                    <?php
                                        $phpTarih = strtotime($rowYorumlar["tarih"]);
                                        $phpTarihGosterim = date("d.m.Y H:i:s", $phpTarih);
                                        echo $phpTarihGosterim;
                                    ?>
                                </span>
                            </p>
                            <p>
                                <?php echo $rowYorumlar["yorum"]; ?>
                            </p>
                        </li>
                <?php } ?>
            </ul>
            <h2>Yorum Yaz</h2>
            <form action="" method="post">
                <textarea name="yorum"></textarea>
                <input type="submit" name="gonder" value="Gönder" class="sag">
                <input type="reset" value="İptal" class="sag">
            </form>
        </div>
    </div>

<?php include('sablon/alt.php'); ?>
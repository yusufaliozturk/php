<div class="yanbar">
  <div class="uye-kisa-bilgi">
    <img src="<?php echo $_SESSION['resim']; ?>" width="128" height="128">
    <p><a href="profilim.php" title="">Profilim</a></p>
    <p><?php echo $_SESSION["adi"]." ".$_SESSION["soyadi"]; ?></p>
    <p>
      <?php
        $phpTarih=strtotime($_SESSION["oncekiLogin"]);
        $phpTarihGosterim=date("d.m.Y H:i:s", $phpTarih);

        echo "Son Giriş Tarihin:".$phpTarihGosterim;

      ?>
    </p>
  </div>
  <div class="kategoriler">
    <h2>Kategoriler</h2> 
    <ul>
      <?php
        $sqlKategoriler="SELECT * FROM kategoriler ORDER BY kategoriAdi ASC";
        $resultKategoriler=mysql_query($sqlKategoriler);
        while($rowKategoriler=mysql_fetch_array($resultKategoriler))
        {
          echo "<li><a href='#'>".$rowKategoriler["kategoriAdi"]."</a></li>";
        }
      ?>
    </ul>  
  </div>
  <div class="arama">Buraya arama butonu koyulacak.</div>
</div>
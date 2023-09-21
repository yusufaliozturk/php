<?php include('sablon/ust.php'); ?>

<?php include('sablon/sol.php'); ?>

<div class="admin-sag">

	<?php

	$onay="";
	$kulAdi="";
	$eposta="";
	$sifre="";
	$sifretekrar="";
	$adi="";
	$soyadi="";
	$cinsiyet="";
	$tel="";
	$adres="";
	$dYer="";
	$dTarih="";
	$ogrenimDurumu="";
	$soru="";    
	$cevap="";
	$tur="";
	$resim="img/kullanici.png";

	$_SESSION["kayitHatalari"]=array();

	if(@$_POST["gonder"])
	{
		$onay=$_POST["onay"];
		$kulAdi=trim($_POST["kulAdi"]);
		$eposta      =   trim($_POST["eposta"]);
		$sifre       =   trim($_POST["sifre"]);
		$sifretekrar   =   trim($_POST["sifretekrar"]);
		$adi        =   trim($_POST["adi"]);
		$soyadi       =   trim($_POST["soyadi"]);
		$cinsiyet      =   trim($_POST["cinsiyet"]);
		$tel=trim($_POST["tel"]);
		$adres         =   trim($_POST["adres"]);
		$dYer      =   trim($_POST["dYer"]);
		$dTarih      =   date('Y-m-d', strtotime($_POST['dTarih']));
		$ogrenimDurumu      =   trim($_POST["ogrenimDurumu"]);
		$soru      =   trim($_POST["soru"]);        
		$cevap      =   trim($_POST["cevap"]);
		$tur=$_POST["tur"];

		if(@$_GET["islem"]=="duzenle")
			$sql="SELECT kulAdi FROM kullanici WHERE kulAdi='".$kulAdi."' AND kulId<>".$_GET["id"];
		else
			$sql="SELECT kulAdi FROM kullanici WHERE kulAdi='".$kulAdi."'";
		
		$result=mysql_query($sql);
		$kayitSayisi=mysql_num_rows($result);

		if(@$_GET["islem"]=="duzenle")
			$sql2="SELECT eposta FROM kullanici WHERE eposta='".$eposta."' AND kulId<>".$_GET["id"];
		else
			$sql2="SELECT eposta FROM kullanici WHERE eposta='".$eposta."'";

		$result2=mysql_query($sql2);
		$kayitSayisi2=mysql_num_rows($result2);

		if((!empty($kulAdi) && $kayitSayisi<1) &&
		(!empty($eposta) && filter_var($eposta, FILTER_VALIDATE_EMAIL) && $kayitSayisi2<1) &&
		(!empty($sifre) && !empty($sifretekrar) && $sifre==$sifretekrar && mb_strlen($sifre)>=8 && !turkceKarakterVarmi($sifre)) &&
		!empty($soru) && !empty($cevap))
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
				$sql="UPDATE kullanici
		    	SET kulAdi='$kulAdi',eposta='$eposta',sifre='$sifre',adi='$adi',soyadi='$soyadi',cinsiyet='$cinsiyet',tel='$tel',adres='$adres',dYer='$dYer',dTarih='$dTarih',ogrenimDurumu='$ogrenimDurumu',resim='$resim',soru='$soru',cevap='$cevap',onay='$onay',tur='$tur' WHERE kulId=".$_GET["id"];
			else
				$sql="INSERT INTO kullanici
		    	(kulAdi,eposta,sifre,adi,soyadi,cinsiyet,tel,adres,dYer,dTarih,ogrenimDurumu,resim,soru,cevap,unuttumKod,onay,oncekiLogin,tur) VALUES('$kulAdi','$eposta','$sifre','$adi','$soyadi','$cinsiyet','$tel','$adres','$dYer','$dTarih','$ogrenimDurumu','$resim','$soru','$cevap','','$onay','0000-00-00 00:00:00', '$tur')";

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

			if(empty($kulAdi))
			{
				$_SESSION["kayitHatalari"]["kulAdi"]="Kullanıcı adı boş bırakılamaz.";
			}
			elseif($kayitSayisi>0)
			{
				$_SESSION["kayitHatalari"]["kulAdi"]="Bu kullanıcı adı daha önceden alınmış.";
			}

			if(empty($eposta))
			{
				$_SESSION["kayitHatalari"]["eposta"]="Eposta alanı boş bırakılamaz.";
			}
			elseif(filter_var($eposta, FILTER_VALIDATE_EMAIL) === false)
			{
				$_SESSION["kayitHatalari"]["eposta"]="Lütfen geçerli bir email adresi girin. Örn:kerembh4@gmail.com";
			}
			elseif($kayitSayisi2>0)
			{
				$_SESSION["kayitHatalari"]["eposta"]="Bu eposta daha önceden alınmış.";
			}

			if(empty($sifre) || empty($sifretekrar))
			{
				$_SESSION["kayitHatalari"]["sifre"]="Şifre alanı veya şifre tekrar boş bırakılamaz.";
			}
			elseif($sifre!=$sifretekrar)
			{
				$_SESSION["kayitHatalari"]["sifre"]="Girdiğiniz şifreler birbiriyle uyuşmuyor.";
			}
			elseif(mb_strlen($sifre)<8)
			{
				$_SESSION["kayitHatalari"]["sifre"]="Girdiğiniz şifre en az 8 karakter uzunluğunda olmalıdır.";
			}
			elseif(turkceKarakterVarmi($sifre))
			{
				$_SESSION["kayitHatalari"]["sifre"]="Girdiğiniz şifrede Türkçe karakter olmamalıdır.Bunlar:İığĞüÜşŞöÖçÇ";
			}

			if(empty($soru))
			{
				$_SESSION["kayitHatalari"]["soru"]="Güvenlik sorusu alanı boş bırakılamaz.";
			}

			if(empty($cevap))
			{
				$_SESSION["kayitHatalari"]["cevap"]="Güvenlik cevabı alanı boş bırakılamaz.";
			}
		}
	}
	else if(@$_GET["islem"]=="duzenle")
	{
		$sql="SELECT * FROM kullanici WHERE kulId=".$_GET["id"];
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		$onay=$row["onay"];
		$kulAdi=$row["kulAdi"];
		$eposta=$row["eposta"];
		$sifre=$row["sifre"];
		$sifretekrar=$row["sifre"];
		$adi=$row["adi"];
		$soyadi=$row["soyadi"];
		$cinsiyet=$row["cinsiyet"];
		$tel=$row["tel"];
		$adres=$row["adres"];
		$dYer=$row["dYer"];

		$dTarih = $row["dTarih"];

		$ogrenimDurumu=$row["ogrenimDurumu"];
		$soru=$row["soru"];        
		$cevap=$row["cevap"];
		$tur=$row["tur"];

		$resim=$row["resim"];
	}

  ?>
  <form enctype="multipart/form-data" action="" method="post" name="uyeKayitFormu">
    <table>
    	<tr>
    		<td>Kullanıcı Türü</td>
    		<td>
    			<select name="tur">
    				<option value="Kullanıcı" <?php if($tur=="Kullanıcı"){ echo "selected='selected'"; }?>>Kullanıcı</option>
    				<option value="Admin" <?php if($tur=="Admin"){ echo "selected='selected'"; }?>>Admin</option>
    			</select>
    		</td>
    	</tr>
    	<tr>
    		<td>Onay Durumu</td>
    		<td>
    			<select name="onay">
    				<option value="Onaylandı" <?php if($onay=="Onaylı"){ echo "selected='selected'"; }?>>Onaylı</option>
    				<option value="Onaylanmadı" <?php if($onay=="Onaylanmadı"){ echo "selected='selected'"; }?>>Onaysız</option>
    			</select>
    		</td>
    	</tr>
      <tr>
        <td>Kullanıcı Adı*</td>
        
        <td>
          <input class="kutular" type="text" name="kulAdi" value="<?php echo $kulAdi; ?>" />
          <?php
            if (@array_key_exists('kulAdi', $_SESSION["kayitHatalari"]))
            { ?>
            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["kulAdi"]; ?></span>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>E-posta*</td>
        
        <td>
          <input class="kutular" type="text" name="eposta" value="<?php echo $eposta; ?>" />
          <?php
            if (@array_key_exists('eposta', $_SESSION["kayitHatalari"]))
            { ?>
            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["eposta"]; ?></span>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>Şifre*</td>
        <td>
          <input type="text" class="kutular" name="sifre" value="<?php echo $sifre; ?>" />
          <?php
            if (@array_key_exists('sifre', $_SESSION["kayitHatalari"]))
            { ?>
            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["sifre"]; ?></span>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>Şifre tekrar*</td>
        
        <td><input type="text" class="kutular" name="sifretekrar" value="<?php echo $sifretekrar; ?>" /></td>
      </tr>
      <tr>
        <td>Ad</td>
        
        <td><input type="text" class="kutular" name="adi" value="<?php echo $adi; ?>" /></td>
      </tr>
      <tr>
        <td>Soyad</td>
        
        <td><input type="text" class="kutular" name="soyadi" value="<?php echo $soyadi; ?>" /></td>
      </tr>
      <tr>
        <td>Cinsiyet</td>
        
        <td>
          <select class="kutular" name="cinsiyet">
            <option value="Bay" <?php if($cinsiyet=="Bay"){ echo "selected='selected'"; }?>>Bay</option>
            <option value="Bayan" <?php if($cinsiyet=="Bayan"){ echo "selected='selected'"; }?>>Bayan</option>
          </select>
       </td>
      </tr>
      <tr>
        <td>Telefon</td>
        
        <td><input type="text" class="kutular" name="tel" value="<?php echo $tel; ?>" /></td>
      </tr>
      <tr>
        <td>Doğum Tarihi</td>
        
        <td><input type="date" class="kutular" name="dTarih" value="<?php echo $dTarih; ?>" /></td>
      </tr>
      <tr>
        <td>Doğum Yeriniz</td>
        
        <td>
          <select class="kutular" name="dYer">
            <option value="Adana" <?php if($dYer=="Adana"){ echo "selected='selected'"; }?>>Adana</option>
            <option value="Adıyaman" <?php if($dYer=="Adıyaman"){ echo "selected='selected'"; }?>>Adıyaman</option>
            <option value="Afyon" <?php if($dYer=="Afyon"){ echo "selected='selected'"; }?>>Afyon</option>
            <option value="Ağrı" <?php if($dYer=="Ağrı"){ echo "selected='selected'"; }?>>Ağrı</option>
            <option value="Aksaray" <?php if($dYer=="Aksaray"){ echo "selected='selected'"; }?>>Aksaray</option>
            <option value="Amasya" <?php if($dYer=="Amasya"){ echo "selected='selected'"; }?>>Amasya</option>
            <option value="Ankara" <?php if($dYer=="Ankara"){ echo "selected='selected'"; }?>>Ankara</option>
            <option value="Ardahan" <?php if($dYer=="Ardahan"){ echo "selected='selected'"; }?>>Ardahan</option>
            <option value="Artvin" <?php if($dYer=="Artvin"){ echo "selected='selected'"; }?>>Artvin</option>
            <option value="Aydın" <?php if($dYer=="Aydın"){ echo "selected='selected'"; }?>>Aydın</option>
            <option value="Balıkesir" <?php if($dYer=="Balıkesir"){ echo "selected='selected'"; }?>>Balıkesir</option>
            <option value="Bartın" <?php if($dYer=="Bartın"){ echo "selected='selected'"; }?>>Bartın</option>
            <option value="Batman" <?php if($dYer=="Batman"){ echo "selected='selected'"; }?>>Batman</option>
            <option value="Bayburt" <?php if($dYer=="Bayburt"){ echo "selected='selected'"; }?>>Bayburt</option>
            <option value="Bilecik" <?php if($dYer=="Bilecik"){ echo "selected='selected'"; }?>>Bilecik</option>
            <option value="Bingöl" <?php if($dYer=="Bingöl"){ echo "selected='selected'"; }?>>Bingöl</option>
            <option value="Bitlis" <?php if($dYer=="Bitlis"){ echo "selected='selected'"; }?>>Bitlis</option>
            <option value="Bolu" <?php if($dYer=="Bolu"){ echo "selected='selected'"; }?>>Bolu</option>
            <option value="Bursa" <?php if($dYer=="Bursa"){ echo "selected='selected'"; }?>>Bursa</option>
            <option value="Çanakkale" <?php if($dYer=="Çanakkale"){ echo "selected='selected'"; }?>>Çanakkale</option>
            <option value="Çankırı" <?php if($dYer=="Çankırı"){ echo "selected='selected'"; }?>>Çankırı</option>
            <option value="Çorum" <?php if($dYer=="Çorum"){ echo "selected='selected'"; }?>>Çorum</option>
            <option value="Denizli" <?php if($dYer=="Denizli"){ echo "selected='selected'"; }?>>Denizli</option>
            <option value="Diyarbakır" <?php if($dYer=="Diyarbakır"){ echo "selected='selected'"; }?>>Diyarbakır</option>
            <option value="Düzce" <?php if($dYer=="Düzce"){ echo "selected='selected'"; }?>>Düzce</option>
            <option value="Edirne" <?php if($dYer=="Edirne"){ echo "selected='selected'"; }?>>Edirne</option>
            <option value="Elazığ" <?php if($dYer=="Elazığ"){ echo "selected='selected'"; }?>>Elazığ</option>
            <option value="Erzincan" <?php if($dYer=="Erzincan"){ echo "selected='selected'"; }?>>Erzincan</option>
            <option value="Erzurum" <?php if($dYer=="Erzurum"){ echo "selected='selected'"; }?>>Erzurum</option>
            <option value="Eskişehir" <?php if($dYer=="Eskişehir"){ echo "selected='selected'"; }?>>Eskişehir</option>
            <option value="Gaziantep" <?php if($dYer=="Gaziantep"){ echo "selected='selected'"; }?>>Gaziantep</option>
            <option value="Giresun" <?php if($dYer=="Giresun"){ echo "selected='selected'"; }?>>Giresun</option>
            <option value="Gümüşhane" <?php if($dYer=="Gümüşhane"){ echo "selected='selected'"; }?>>Gümüşhane</option>
            <option value="Hakkari" <?php if($dYer=="Hakkari"){ echo "selected='selected'"; }?>>Hakkari</option>
            <option value="Hatay" <?php if($dYer=="Hatay"){ echo "selected='selected'"; }?>>Hatay</option>
            <option value="Iğdır" <?php if($dYer=="Iğdır"){ echo "selected='selected'"; }?>>Iğdır</option>
            <option value="Isparta" <?php if($dYer=="Isparta"){ echo "selected='selected'"; }?>>Isparta</option>
            <option value="İstanbul" <?php if($dYer=="İstanbul"){ echo "selected='selected'"; }?>>İstanbul</option>
            <option value="İzmir" <?php if($dYer=="İzmir"){ echo "selected='selected'"; }?>>İzmir</option>
            <option value="Kahramanmaraş" <?php if($dYer=="Kahramanmaraş"){ echo "selected='selected'"; }?>>Kahramanmaraş</option>
            <option value="Karabük" <?php if($dYer=="Karabük"){ echo "selected='selected'"; }?>>Karabük</option>
            <option value="Karaman" <?php if($dYer=="Karaman"){ echo "selected='selected'"; }?>>Karaman</option>
            <option value="Kars" <?php if($dYer=="Kars"){ echo "selected='selected'"; }?>>Kars</option>
            <option value="Kastamonu" <?php if($dYer=="Kastamonu"){ echo "selected='selected'"; }?>>Kastamonu</option>
            <option value="Kayseri" <?php if($dYer=="Kayseri"){ echo "selected='selected'"; }?>>Kayseri</option>
            <option value="Kilis" <?php if($dYer=="Kilis"){ echo "selected='selected'"; }?>>Kilis</option>
            <option value="Kırklareli" <?php if($dYer=="Kırklareli"){ echo "selected='selected'"; }?>>Kırklareli</option>
            <option value="Kırıkkale" <?php if($dYer=="Kırıkkale"){ echo "selected='selected'"; }?>>Kırıkkale</option>
            <option value="Kırşehir" <?php if($dYer=="Kırşehir"){ echo "selected='selected'"; }?>>Kırşehir</option>
            <option value="Kocaeli" <?php if($dYer=="Kocaeli"){ echo "selected='selected'"; }?>>Kocaeli</option>
            <option value="Konya" <?php if($dYer=="Konya"){ echo "selected='selected'"; }?>>Konya</option>
            <option value="Kütahya" <?php if($dYer=="Kütahya"){ echo "selected='selected'"; }?>>Kütahya</option>
            <option value="Malatya" <?php if($dYer=="Malatya"){ echo "selected='selected'"; }?>>Malatya</option>
            <option value="Manisa" <?php if($dYer=="Manisa"){ echo "selected='selected'"; }?>>Manisa</option>
            <option value="Mardin" <?php if($dYer=="Mardin"){ echo "selected='selected'"; }?>>Mardin</option>
            <option value="Mersin" <?php if($dYer=="Mersin"){ echo "selected='selected'"; }?>>Mersin</option>
            <option value="Muğla" <?php if($dYer=="Muğla"){ echo "selected='selected'"; }?>>Muğla</option>
            <option value="Muş" <?php if($dYer=="Muş"){ echo "selected='selected'"; }?>>Muş</option>
            <option value="Nevşehir" <?php if($dYer=="Nevşehir"){ echo "selected='selected'"; }?>>Nevşehir</option>
            <option value="Niğde" <?php if($dYer=="Niğde"){ echo "selected='selected'"; }?>>Niğde</option>
            <option value="Ordu" <?php if($dYer=="Ordu"){ echo "selected='selected'"; }?>>Ordu</option>
            <option value="Osmaniye" <?php if($dYer=="Osmaniye"){ echo "selected='selected'"; }?>>Osmaniye</option>
            <option value="Rize" <?php if($dYer=="Rize"){ echo "selected='selected'"; }?>>Rize</option>
            <option value="Sakarya" <?php if($dYer=="Sakarya"){ echo "selected='selected'"; }?>>Sakarya</option>
            <option value="Samsun" <?php if($dYer=="Samsun"){ echo "selected='selected'"; }?>>Samsun</option>
            <option value="Siirt" <?php if($dYer=="Siirt"){ echo "selected='selected'"; }?>>Siirt</option>
            <option value="Sinop" <?php if($dYer=="Sinop"){ echo "selected='selected'"; }?>>Sinop</option>
            <option value="Sivas" <?php if($dYer=="Sivas"){ echo "selected='selected'"; }?>>Sivas</option>
            <option value="Şanlıurfa" <?php if($dYer=="Şanlıurfa"){ echo "selected='selected'"; }?>>Şanlıurfa</option>
            <option value="Şırnak" <?php if($dYer=="Şırnak"){ echo "selected='selected'"; }?>>Şırnak</option>
            <option value="Tekirdağ" <?php if($dYer=="Tekirdağ"){ echo "selected='selected'"; }?>>Tekirdağ</option>
            <option value="Tokat" <?php if($dYer=="Tokat"){ echo "selected='selected'"; }?>>Tokat</option>
            <option value="Trabzon" <?php if($dYer=="Trabzon"){ echo "selected='selected'"; }?>>Trabzon</option>
            <option value="Tunceli" <?php if($dYer=="Tunceli"){ echo "selected='selected'"; }?>>Tunceli</option>
            <option value="Uşak" <?php if($dYer=="Uşak"){ echo "selected='selected'"; }?>>Uşak</option>
            <option value="Van" <?php if($dYer=="Van"){ echo "selected='selected'"; }?>>Van</option>
            <option value="Yalova" <?php if($dYer=="Yalova"){ echo "selected='selected'"; }?>>Yalova</option>
            <option value="Yozgat" <?php if($dYer=="Yozgat"){ echo "selected='selected'"; }?>>Yozgat</option>
            <option value="Zonguldak" <?php if($dYer=="Zonguldak"){ echo "selected='selected'"; }?>>Zonguldak</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Adresiniz</td>
        
        <td>
          <textarea name="adres"><?php echo $adres; ?></textarea>
        </td>
      </tr>
      <tr>
        <td>Öğrenim Durumunuz</td>
        
        <td>
          <select class="kutular" name="ogrenimDurumu">
            <option value="İlkokul" <?php if($ogrenimDurumu=="İlkokul"){ echo "selected='selected'"; }?>>İlkokul</option>
            <option value="Ortaokul" <?php if($ogrenimDurumu=="Ortaokul"){ echo "selected='selected'"; }?>>Ortaokul</option>
            <option value="Lise" <?php if($ogrenimDurumu=="Lise"){ echo "selected='selected'"; }?>>Lise</option>
            <option value="Üniversite" <?php if($ogrenimDurumu=="Üniversite"){ echo "selected='selected'"; }?>>Üniversite</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Güvenlik Sorusu*</td>
        
        <td>
          <input type="text" name="soru" value="<?php echo $soru; ?>">
          <?php
            if (@array_key_exists('soru', $_SESSION["kayitHatalari"]))
            { ?>
            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["soru"]; ?></span>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>Güvenlik Cevabı*</td>
        
        <td>
          <input type="text" name="cevap" value="<?php echo $cevap; ?>">
          <?php
            if (@array_key_exists('cevap', $_SESSION["kayitHatalari"]))
            { ?>
            <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["cevap"]; ?></span>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>Resminiz</td>
        
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
<?php
include("ayar.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Gossip Kitabevi</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="disdiv">
      <div class="banner">
        <img src="img/kitap-sifre-banner.jpg" />
      </div>
    
  <div style="width: 100%; height:710px; overflow-y: scroll;">
    <?php

    $_SESSION["kayitHatalari"]=array();

    if(@$_POST["gonder"])
    {
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
      $resim="img/kullanici.png";

      $sql="SELECT kulAdi FROM kullanici WHERE kulAdi='".$kulAdi."'";
      $result=mysql_query($sql);
      $kayitSayisi=@mysql_num_rows($result);

      $sql2="SELECT eposta FROM kullanici WHERE eposta='".$eposta."'";
      $result2=mysql_query($sql2);
      $kayitSayisi2=@mysql_num_rows($result2);

      if((!empty($kulAdi) && $kayitSayisi<1) &&
        (!empty($eposta) && filter_var($eposta, FILTER_VALIDATE_EMAIL) && $kayitSayisi2<1) &&
        (!empty($sifre) && !empty($sifretekrar) && $sifre==$sifretekrar && mb_strlen($sifre)>=8 && !turkceKarakterVarmi($sifre)) &&
        !empty($soru) && !empty($cevap))
      {

        if(isset($_FILES["resim"]))
        {
          include("uploads/class.upload.php");
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
            $handle->process('uploads/');
            if ($handle->processed) {
              $resim=$handle->file_dst_pathname;
              $handle->clean();

            }
            else
            {
              echo 'Resim yüklerken hata oluştu. Hata:  ' . $handle->error;
            }
          }
        }

        $sql="INSERT INTO kullanici
            (kulAdi,eposta,sifre,adi,soyadi,cinsiyet,tel,adres,dYer,dTarih,ogrenimDurumu,resim,soru,cevap,unuttumKod,onay, oncekiLogin, tur) VALUES('$kulAdi','$eposta','$sifre','$adi','$soyadi','$cinsiyet','$tel','$adres','$dYer','$dTarih','$ogrenimDurumu','$resim','$soru','$cevap','','Onaylanmadı','0000-00-00 00:00:00', 'Kullanıcı')";

            if(mysql_query($sql))
            {
              header('Location: giris.php');
            }
            else
            {
              echo "Veritabanına aktarılırken hata oluştu. Hata: ".mysql_error();   
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
      ?>
      <form enctype="multipart/form-data" action="" method="post" name="uyeKayitFormu" class="uyeKayitFormu">
        <table>
          <tr>
            <td>Kullanıcı Adı*</td>
            <td>:</td>
            <td>
              <input class="kutular" type="text" name="kulAdi" value="<?php echo @$_POST['kulAdi']; ?>" />
              <?php
                if (@array_key_exists('kulAdi', $_SESSION["kayitHatalari"]))
                { ?>
                <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["kulAdi"]; ?></span>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>E-posta*</td>
            <td>:</td>
            <td>
              <input class="kutular" type="text" name="eposta" value="<?php echo @$_POST['eposta']; ?>" />
              <?php
                if (@array_key_exists('eposta', $_SESSION["kayitHatalari"]))
                { ?>
                <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["eposta"]; ?></span>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>Şifre*</td>
            <td>:</td>
            <td>
              <input type="text" class="kutular" name="sifre" value="<?php echo @$_POST['sifre']; ?>" />
              <?php
                if (@array_key_exists('sifre', $_SESSION["kayitHatalari"]))
                { ?>
                <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["sifre"]; ?></span>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>Şifre tekrar*</td>
            <td>:</td>
            <td><input type="text" class="kutular" name="sifretekrar" value="<?php echo @$_POST['sifretekrar']; ?>" /></td>
          </tr>
          <tr>
            <td>Ad</td>
            <td>:</td>
            <td><input type="text" class="kutular" name="adi" value="<?php echo @$_POST['adi']; ?>" /></td>
          </tr>
          <tr>
            <td>Soyad</td>
            <td>:</td>
            <td><input type="text" class="kutular" name="soyadi" value="<?php echo @$_POST['soyadi']; ?>" /></td>
          </tr>
          <tr>
            <td>Cinsiyet</td>
            <td>:</td>
            <td>
              <select class="kutular" name="cinsiyet">
                <option value="Bay" <?php if(@$_POST["cinsiyet"]=="Bay"){ echo "selected='selected'"; }?>>Bay</option>
                <option value="Bayan" <?php if(@$_POST["cinsiyet"]=="Bayan"){ echo "selected='selected'"; }?>>Bayan</option>
              </select>
           </td>
          </tr>
          <tr>
            <td>Telefon</td>
            <td>:</td>
            <td><input type="text" class="kutular" name="tel" value="<?php echo @$_POST['tel']; ?>" /></td>
          </tr>
          <tr>
            <td>Doğum Tarihi</td>
            <td>:</td>
            <td><input type="date" class="kutular" name="dTarih" value="<?php echo @$_POST['dTarih']; ?>" /></td>
          </tr>
          <tr>
            <td>Doğum Yeriniz</td>
            <td>:</td>
            <td>
              <select class="kutular" name="dYer">
                <option value="Adana" <?php if(@$_POST["dYer"]=="Adana"){ echo "selected='selected'"; }?>>Adana</option>
                <option value="Adıyaman" <?php if(@$_POST["dYer"]=="Adıyaman"){ echo "selected='selected'"; }?>>Adıyaman</option>
                <option value="Afyon" <?php if(@$_POST["dYer"]=="Afyon"){ echo "selected='selected'"; }?>>Afyon</option>
                <option value="Ağrı" <?php if(@$_POST["dYer"]=="Ağrı"){ echo "selected='selected'"; }?>>Ağrı</option>
                <option value="Aksaray" <?php if(@$_POST["dYer"]=="Aksaray"){ echo "selected='selected'"; }?>>Aksaray</option>
                <option value="Amasya" <?php if(@$_POST["dYer"]=="Amasya"){ echo "selected='selected'"; }?>>Amasya</option>
                <option value="Ankara" <?php if(@$_POST["dYer"]=="Ankara"){ echo "selected='selected'"; }?>>Ankara</option>
                <option value="Ardahan" <?php if(@$_POST["dYer"]=="Ardahan"){ echo "selected='selected'"; }?>>Ardahan</option>
                <option value="Artvin" <?php if(@$_POST["dYer"]=="Artvin"){ echo "selected='selected'"; }?>>Artvin</option>
                <option value="Aydın" <?php if(@$_POST["dYer"]=="Aydın"){ echo "selected='selected'"; }?>>Aydın</option>
                <option value="Balıkesir" <?php if(@$_POST["dYer"]=="Balıkesir"){ echo "selected='selected'"; }?>>Balıkesir</option>
                <option value="Bartın" <?php if(@$_POST["dYer"]=="Bartın"){ echo "selected='selected'"; }?>>Bartın</option>
                <option value="Batman" <?php if(@$_POST["dYer"]=="Batman"){ echo "selected='selected'"; }?>>Batman</option>
                <option value="Bayburt" <?php if(@$_POST["dYer"]=="Bayburt"){ echo "selected='selected'"; }?>>Bayburt</option>
                <option value="Bilecik" <?php if(@$_POST["dYer"]=="Bilecik"){ echo "selected='selected'"; }?>>Bilecik</option>
                <option value="Bingöl" <?php if(@$_POST["dYer"]=="Bingöl"){ echo "selected='selected'"; }?>>Bingöl</option>
                <option value="Bitlis" <?php if(@$_POST["dYer"]=="Bitlis"){ echo "selected='selected'"; }?>>Bitlis</option>
                <option value="Bolu" <?php if(@$_POST["dYer"]=="Bolu"){ echo "selected='selected'"; }?>>Bolu</option>
                <option value="Bursa" <?php if(@$_POST["dYer"]=="Bursa"){ echo "selected='selected'"; }?>>Bursa</option>
                <option value="Çanakkale" <?php if(@$_POST["dYer"]=="Çanakkale"){ echo "selected='selected'"; }?>>Çanakkale</option>
                <option value="Çankırı" <?php if(@$_POST["dYer"]=="Çankırı"){ echo "selected='selected'"; }?>>Çankırı</option>
                <option value="Çorum" <?php if(@$_POST["dYer"]=="Çorum"){ echo "selected='selected'"; }?>>Çorum</option>
                <option value="Denizli" <?php if(@$_POST["dYer"]=="Denizli"){ echo "selected='selected'"; }?>>Denizli</option>
                <option value="Diyarbakır" <?php if(@$_POST["dYer"]=="Diyarbakır"){ echo "selected='selected'"; }?>>Diyarbakır</option>
                <option value="Düzce" <?php if(@$_POST["dYer"]=="Düzce"){ echo "selected='selected'"; }?>>Düzce</option>
                <option value="Edirne" <?php if(@$_POST["dYer"]=="Edirne"){ echo "selected='selected'"; }?>>Edirne</option>
                <option value="Elazığ" <?php if(@$_POST["dYer"]=="Elazığ"){ echo "selected='selected'"; }?>>Elazığ</option>
                <option value="Erzincan" <?php if(@$_POST["dYer"]=="Erzincan"){ echo "selected='selected'"; }?>>Erzincan</option>
                <option value="Erzurum" <?php if(@$_POST["dYer"]=="Erzurum"){ echo "selected='selected'"; }?>>Erzurum</option>
                <option value="Eskişehir" <?php if(@$_POST["dYer"]=="Eskişehir"){ echo "selected='selected'"; }?>>Eskişehir</option>
                <option value="Gaziantep" <?php if(@$_POST["dYer"]=="Gaziantep"){ echo "selected='selected'"; }?>>Gaziantep</option>
                <option value="Giresun" <?php if(@$_POST["dYer"]=="Giresun"){ echo "selected='selected'"; }?>>Giresun</option>
                <option value="Gümüşhane" <?php if(@$_POST["dYer"]=="Gümüşhane"){ echo "selected='selected'"; }?>>Gümüşhane</option>
                <option value="Hakkari" <?php if(@$_POST["dYer"]=="Hakkari"){ echo "selected='selected'"; }?>>Hakkari</option>
                <option value="Hatay" <?php if(@$_POST["dYer"]=="Hatay"){ echo "selected='selected'"; }?>>Hatay</option>
                <option value="Iğdır" <?php if(@$_POST["dYer"]=="Iğdır"){ echo "selected='selected'"; }?>>Iğdır</option>
                <option value="Isparta" <?php if(@$_POST["dYer"]=="Isparta"){ echo "selected='selected'"; }?>>Isparta</option>
                <option value="İstanbul" <?php if(@$_POST["dYer"]=="İstanbul"){ echo "selected='selected'"; }?>>İstanbul</option>
                <option value="İzmir" <?php if(@$_POST["dYer"]=="İzmir"){ echo "selected='selected'"; }?>>İzmir</option>
                <option value="Kahramanmaraş" <?php if(@$_POST["dYer"]=="Kahramanmaraş"){ echo "selected='selected'"; }?>>Kahramanmaraş</option>
                <option value="Karabük" <?php if(@$_POST["dYer"]=="Karabük"){ echo "selected='selected'"; }?>>Karabük</option>
                <option value="Karaman" <?php if(@$_POST["dYer"]=="Karaman"){ echo "selected='selected'"; }?>>Karaman</option>
                <option value="Kars" <?php if(@$_POST["dYer"]=="Kars"){ echo "selected='selected'"; }?>>Kars</option>
                <option value="Kastamonu" <?php if(@$_POST["dYer"]=="Kastamonu"){ echo "selected='selected'"; }?>>Kastamonu</option>
                <option value="Kayseri" <?php if(@$_POST["dYer"]=="Kayseri"){ echo "selected='selected'"; }?>>Kayseri</option>
                <option value="Kilis" <?php if(@$_POST["dYer"]=="Kilis"){ echo "selected='selected'"; }?>>Kilis</option>
                <option value="Kırklareli" <?php if(@$_POST["dYer"]=="Kırklareli"){ echo "selected='selected'"; }?>>Kırklareli</option>
                <option value="Kırıkkale" <?php if(@$_POST["dYer"]=="Kırıkkale"){ echo "selected='selected'"; }?>>Kırıkkale</option>
                <option value="Kırşehir" <?php if(@$_POST["dYer"]=="Kırşehir"){ echo "selected='selected'"; }?>>Kırşehir</option>
                <option value="Kocaeli" <?php if(@$_POST["dYer"]=="Kocaeli"){ echo "selected='selected'"; }?>>Kocaeli</option>
                <option value="Konya" <?php if(@$_POST["dYer"]=="Konya"){ echo "selected='selected'"; }?>>Konya</option>
                <option value="Kütahya" <?php if(@$_POST["dYer"]=="Kütahya"){ echo "selected='selected'"; }?>>Kütahya</option>
                <option value="Malatya" <?php if(@$_POST["dYer"]=="Malatya"){ echo "selected='selected'"; }?>>Malatya</option>
                <option value="Manisa" <?php if(@$_POST["dYer"]=="Manisa"){ echo "selected='selected'"; }?>>Manisa</option>
                <option value="Mardin" <?php if(@$_POST["dYer"]=="Mardin"){ echo "selected='selected'"; }?>>Mardin</option>
                <option value="Mersin" <?php if(@$_POST["dYer"]=="Mersin"){ echo "selected='selected'"; }?>>Mersin</option>
                <option value="Muğla" <?php if(@$_POST["dYer"]=="Muğla"){ echo "selected='selected'"; }?>>Muğla</option>
                <option value="Muş" <?php if(@$_POST["dYer"]=="Muş"){ echo "selected='selected'"; }?>>Muş</option>
                <option value="Nevşehir" <?php if(@$_POST["dYer"]=="Nevşehir"){ echo "selected='selected'"; }?>>Nevşehir</option>
                <option value="Niğde" <?php if(@$_POST["dYer"]=="Niğde"){ echo "selected='selected'"; }?>>Niğde</option>
                <option value="Ordu" <?php if(@$_POST["dYer"]=="Ordu"){ echo "selected='selected'"; }?>>Ordu</option>
                <option value="Osmaniye" <?php if(@$_POST["dYer"]=="Osmaniye"){ echo "selected='selected'"; }?>>Osmaniye</option>
                <option value="Rize" <?php if(@$_POST["dYer"]=="Rize"){ echo "selected='selected'"; }?>>Rize</option>
                <option value="Sakarya" <?php if(@$_POST["dYer"]=="Sakarya"){ echo "selected='selected'"; }?>>Sakarya</option>
                <option value="Samsun" <?php if(@$_POST["dYer"]=="Samsun"){ echo "selected='selected'"; }?>>Samsun</option>
                <option value="Siirt" <?php if(@$_POST["dYer"]=="Siirt"){ echo "selected='selected'"; }?>>Siirt</option>
                <option value="Sinop" <?php if(@$_POST["dYer"]=="Sinop"){ echo "selected='selected'"; }?>>Sinop</option>
                <option value="Sivas" <?php if(@$_POST["dYer"]=="Sivas"){ echo "selected='selected'"; }?>>Sivas</option>
                <option value="Şanlıurfa" <?php if(@$_POST["dYer"]=="Şanlıurfa"){ echo "selected='selected'"; }?>>Şanlıurfa</option>
                <option value="Şırnak" <?php if(@$_POST["dYer"]=="Şırnak"){ echo "selected='selected'"; }?>>Şırnak</option>
                <option value="Tekirdağ" <?php if(@$_POST["dYer"]=="Tekirdağ"){ echo "selected='selected'"; }?>>Tekirdağ</option>
                <option value="Tokat" <?php if(@$_POST["dYer"]=="Tokat"){ echo "selected='selected'"; }?>>Tokat</option>
                <option value="Trabzon" <?php if(@$_POST["dYer"]=="Trabzon"){ echo "selected='selected'"; }?>>Trabzon</option>
                <option value="Tunceli" <?php if(@$_POST["dYer"]=="Tunceli"){ echo "selected='selected'"; }?>>Tunceli</option>
                <option value="Uşak" <?php if(@$_POST["dYer"]=="Uşak"){ echo "selected='selected'"; }?>>Uşak</option>
                <option value="Van" <?php if(@$_POST["dYer"]=="Van"){ echo "selected='selected'"; }?>>Van</option>
                <option value="Yalova" <?php if(@$_POST["dYer"]=="Yalova"){ echo "selected='selected'"; }?>>Yalova</option>
                <option value="Yozgat" <?php if(@$_POST["dYer"]=="Yozgat"){ echo "selected='selected'"; }?>>Yozgat</option>
                <option value="Zonguldak" <?php if(@$_POST["dYer"]=="Zonguldak"){ echo "selected='selected'"; }?>>Zonguldak</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Adresiniz</td>
            <td>:</td>
            <td>
              <textarea name="adres"><?php echo @$_POST['adres']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td>Öğrenim Durumunuz</td>
            <td>:</td>
            <td>
              <select class="kutular" name="ogrenimDurumu">
                <option value="İlkokul" <?php if(@$_POST["ogrenimDurumu"]=="İlkokul"){ echo "selected='selected'"; }?>>İlkokul</option>
                <option value="Ortaokul" <?php if(@$_POST["ogrenimDurumu"]=="Ortaokul"){ echo "selected='selected'"; }?>>Ortaokul</option>
                <option value="Lise" <?php if(@$_POST["ogrenimDurumu"]=="Lise"){ echo "selected='selected'"; }?>>Lise</option>
                <option value="Üniversite" <?php if(@$_POST["ogrenimDurumu"]=="Üniversite"){ echo "selected='selected'"; }?>>Üniversite</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Güvenlik Sorusu*</td>
            <td>:</td>
            <td>
              <input type="text" name="soru" value="<?php echo @$_POST['soru']; ?>">
              <?php
                if (@array_key_exists('soru', $_SESSION["kayitHatalari"]))
                { ?>
                <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["soru"]; ?></span>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>Güvenlik Cevabı*</td>
            <td>:</td>
            <td>
              <input type="text" name="cevap" value="<?php echo @$_POST['cevap']; ?>">
              <?php
                if (@array_key_exists('cevap', $_SESSION["kayitHatalari"]))
                { ?>
                <span class="kayitHatasi"><?php echo @$_SESSION["kayitHatalari"]["cevap"]; ?></span>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>Resminiz</td>
            <td>:</td>
            <td><input type="file" name="resim"></td>
          </tr>
          <tr>
            <td colspan="3" align="right">
              <input type="reset" value="Temizle">
              <input type="submit" name="gonder" value="Gönder">
            </td>
          </tr>
        </table>
      </form>
  </div>
    <div class="altbar">Copyright Gossip Kitapevi...</div>
  </div>
</body>
</html>
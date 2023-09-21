

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gossip Kitabevi</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="disdiv">
<?php 
include("include/ayar.php");
include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Bilgi Güncellemeye Girdi','$tarihlog')");
  ?>
   
    
  
  <div class="orta">
  <?php

$sid=$_SESSION["idKullanici"];
if(isset($_POST['gonder'])){
 $kuladi 			=		trim($_POST["kuladi"]);
 $eposta			=		trim($_POST["eposta"]);
 $sifre				=		trim($_POST["sifre"]);
 $sifretekrar		=		trim($_POST["sifretekrar"]);
 $ad				=		trim($_POST["ad"]);
 $soyad				=		trim($_POST["soyad"]);
 $cinsiyet			=		trim($_POST["cinsiyet"]);
 $dtarih			=		trim($_POST["dtarih"]);
 $dyeri				=		trim($_POST["dyeri"]);
 $gsoru				=		trim($_POST["gsoru"]);
 $gcevap			=		trim($_POST["gcevap"]);
 $egitim			=		trim($_POST["egitim"]);
 $meslek			=		trim($_POST["meslek"]);        
 $gsm				=		trim($_POST["atelefon"]);
 $adres			    =		trim($_POST["adres"]);
 $il			    =		trim($_POST["il"]);
 $ilce			    =		trim($_POST["ilce"]);

if ($_FILES["resim"]["size"]<1024*1024){//Dosya boyutu 1Mb tan az olsun
		
			
			$dosya_adi=$_FILES["resim"]["name"];
			//Dosyaya yeni bir isim oluþturuluyor
			$uret=array("ku","rs","fg","ya","kb");
			$uzanti=substr($dosya_adi,-4,4);
			$sayi_tut=rand(1,10000);
			$yeni_ad="resim/".$uret[rand(0,4)].$sayi_tut.$uzanti;
			//Dosya yeni adýyla dosyalar klasörüne kaydedilecek
			if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
		}else{
				echo 'Resim Yüklenmedi!';
			}
		
	}else{			
		echo 'Dosya boyutu 1 Mb ý geçemez!';
	}		
			
$guncelle=mysql_query("update kullanici set KullaniciAd='$kuladi',Ad='$ad',Soyad='$soyad',Resim='$yeni_ad',Eposta='$eposta',Sifre='$sifre',Dtarih='$dtarih',Dyeri='$dyeri',GizliSoru='$gsoru',GizliCevap='$gcevap',OgrenimDurumu='$egitim',Meslek='$meslek',Adres='$adres',il='$il',ilce='$ilce',Gsm='$gsm',Cinsiyet='$cinsiyet' where idKullanici='$sid'");// where den sonra yazılan yere   kullanicinin hangi bilgisi geliyorsa sayfaya ona göre yapılıcak


	   if($guncelle and ($sifre==$sifretekrar) ){
		    echo " Kayıt işlemi tamamlandı...";
		   }else{
			echo " Sıkıntı oluştu...";   
			   }
	   
		   
		   
}
$sec=mysql_query("Select * from kullanici where idKullanici='$sid'");
$dizi=mysql_fetch_array($sec);


 $kuladi1 			=$dizi['KullaniciAd'];
 $eposta1			=$dizi['Eposta'];
 $sifre1			=$dizi['Sifre'];		
 $ad1				=$dizi['Ad'];		
 $soyad1			=$dizi['Soyad'];		
 $cinsiyet1			=$dizi['Cinsiyet'];
 $dyeri1			=$dizi['Dyeri'];			
 $dtarih1			=$dizi['Dtarih'];				
 $gsoru1			=$dizi['GizliSoru'];		
 $gcevap1			=$dizi['GizliCevap'];		
 $egitim1			=$dizi['OgrenimDurumu'];		
 $meslek1			=$dizi['Meslek'];		        	
 $gsm1				=$dizi['Gsm'];		
 $adres1			=$dizi['Adres'];		
 $il1			    =$dizi['il'];	
 $ilce1			    =$dizi['ilce'];		
 	
?>
  
  <b> <h2 align="center" style="color:#000;">Üyelik Bilgilerini Düzenle</h2></b>
 
<table width="380" align="center" border="0"><tr><td colspan="2"><b>
     Üyelik Bilgileri</b>
  </td></tr>
      </table>
    <table width="380" align="center" border="0">
      <form action="" method="post" name="kayit_guncelle" enctype="multipart/form-data">
      <tr>
        <td width="148">Kullanıcı Ad</td>
        <td width="10">:</td>
        <td width="208"><input  type="text" value="<?php echo $kuladi1 ?>" name="kuladi" /></td>
      </tr>
      <tr>
        <td width="148">E-posta*</td>
        <td width="10">:</td>
        <td width="208"><input  type="text" value="<?php echo $eposta1 ?>" name="eposta" /></td>
      </tr>
      <tr>
        <td>Şifre*</td>
        <td>:</td>
        <td><input type="text"  name="sifre" value="<?php echo $sifre1 ?>" /></td>
      </tr>
      <tr>
        <td>Şifre tekrar*</td>
        <td>:</td>
        <td><input type="text"  name="sifretekrar" value="<?php echo  $sifre1 ?>" /></td>
      </tr>
      <tr>
        <td>Ad</td>
        <td>:</td>
        <td><input type="text"  name="ad" maxlength="11" value="<?php echo $ad1; ?>" /></td>
      </tr>
      <tr>
        <td>Soyad</td>
        <td>:</td>
        <td><input type="text"  name="soyad" maxlength="11" value="<?php echo $soyad1; ?>" /></td>
      </tr>
      
       <tr>
        <td>Resminizi seçiniz</td>
        <td>:</td>
        <td><input type="file" name="resim"/></td>
      	</tr>
      
      <tr>
        <td>Cinsiyet</td>
        <td>:</td>
         <td>
         <select  name="cinsiyet">
         <option value="bos"  <?php if($cinsiyet1=="bos"){ echo "selected='selected'"; }?>>   </option>
           <option value="Bayan"  <?php if($cinsiyet1=="Bayan"){ echo "selected='selected'"; }?>>Bayan</option>
           <option value="Bay"  <?php if($cinsiyet1=="Bay"){ echo "selected='selected'"; }?>>Bay</option>
          
         </select>
       </td>
      </tr>
      <tr>
        <td>Telefon</td>
        <td>:</td>
        <td><input type="text"  name="atelefon" maxlength="11" value="<?php echo $gsm1; ?>" /></td>
      </tr>
      <tr>
        <td>Doğum Tarihi</td>
        <td>:</td>
        <td><input type="date"  name="dtarih" value="<?php echo $dtarih1; ?>" /></td>
      </tr>
       <tr>
        <td>Doğum Yeri</td>
        <td>:</td>
        <td><input type="text"  name="dyeri" value="<?php echo $dyeri1; ?>"  /></td>
      </tr>
      <tr>
         <td>Gizli Soru*</td>
        <td>:</td>
        <td><select name="gsoru"  />
            <option value="seciniz" <?php if($gsoru1=="seciniz"){ echo "selected='selected'"; }?>>seçiniz </option>
            <option value="Dedenizin meslegi nedir?" <?php if($gsoru1=="Dedenizin meslegi nedir?"){ echo "selected='selected'"; }?> >Dedenizin mesleği nedir?</option>
            <option value="Annenizin kizlik soyadi nedir?" <?php if($gsoru1=="Annenizin kizlik soyadi nedir?"){ echo "selected='selected'"; }?> >Annenizin kızlık soyadı nedir?</option>
            <option value="En sevdiginiz renk hangisidir?" <?php if($gsoru1=="En sevdiginiz renk hangisidir?"){ echo "selected='selected'"; }?> >En sevdiğiniz renk hangisidir?</option>
            </select></td>
            </tr>
       
       <tr>
        <td>Gizli Cevap</td>
        <td>:</td>
        <td><input type="text"  name="gcevap" value="<?php echo $gcevap1; ?>" /></td>
      </tr>
      <tr>
        <td>Eğitim</td>
        <td>:</td>
        <td><select name="egitim" />
            <option value="seçiniz" <?php if($egitim1=="seçiniz"){ echo "selected='selected'"; }?> > seçiniz </option>
            <option value="İlkokul"  <?php if($egitim1=="İlkokul"){ echo "selected='selected'"; }?> > İlkokul</option>
            <option value="Ortaokul" <?php if($egitim1=="Ortaokul"){ echo "selected='selected'"; }?> > Ortaokul</option>
            <option value="Lise" <?php if($egitim1=="Lise"){ echo "selected='selected'"; }?> > Lise</option>
            <option value="Lisans" <?php if($egitim1=="Lisans"){ echo "selected='selected'"; }?> > Lisans</option>
             <option value="Yükseklisans" <?php if($egitim1=="Yükseklisans"){ echo "selected='selected'"; }?> > Yükseklisans</option>
            </select></td>
      </tr>
      <tr>
        <td>Meslek</td>
        <td>:</td>
        <td><input type="text"  name="meslek" value="<?php echo $meslek1; ?>" /></td>
      </tr><tr></table><table width="380" align="center" border="0"><tr><td colspan="2"><b>
      Adres Bilgilerim</b>
  </td></tr>
      </table>
      <table width="380" align="center" border="0">
  </tr>
      <tr>
      <td>Adres</td>
        <td>:</td>
<td colspan="2"><textarea name="adres"   cols="30" rows="5"><?php echo $adres1; ?> </textarea></td>
</tr>
            <tr>
       <td>İl </td>
       <td>:</td>
       <td>
 <select  name="il">
  <option value="bos" <?php if($il1=="bos"){ echo "selected='selected'"; }?> >   </option>
<option value="Adana" <?php if($il1=="Adana"){ echo "selected='selected'"; }?>>Adana</option>
            <option value="Adıyaman" <?php if($il1=="Adıyaman"){ echo "selected='selected'"; }?>>Adıyaman</option>
            <option value="Afyon" <?php if($il1=="Afyon"){ echo "selected='selected'"; }?>>Afyon</option>
            <option value="Ağrı" <?php if($il1=="Ağrı"){ echo "selected='selected'"; }?>>Ağrı</option>
            <option value="Aksaray" <?php if($il1=="Aksaray"){ echo "selected='selected'"; }?>>Aksaray</option>
            <option value="Amasya" <?php if($il1=="Amasya"){ echo "selected='selected'"; }?>>Amasya</option>
            <option value="Ankara" <?php if($il1=="Ankara"){ echo "selected='selected'"; }?>>Ankara</option>
            <option value="Ardahan" <?php if($il1=="Ardahan"){ echo "selected='selected'"; }?>>Ardahan</option>
            <option value="Artvin" <?php if($il1=="Artvin"){ echo "selected='selected'"; }?>>Artvin</option>
            <option value="Aydın" <?php if($il1=="Aydın"){ echo "selected='selected'"; }?>>Aydın</option>
            <option value="Balıkesir" <?php if($il1=="Balıkesir"){ echo "selected='selected'"; }?>>Balıkesir</option>
            <option value="Bartın" <?php if($il1=="Bartın"){ echo "selected='selected'"; }?>>Bartın</option>
            <option value="Batman" <?php if($il1=="Batman"){ echo "selected='selected'"; }?>>Batman</option>
            <option value="Bayburt" <?php if($il1=="Bayburt"){ echo "selected='selected'"; }?>>Bayburt</option>
            <option value="Bilecik" <?php if($il1=="Bilecik"){ echo "selected='selected'"; }?>>Bilecik</option>
            <option value="Bingöl" <?php if($il1=="Bingöl"){ echo "selected='selected'"; }?>>Bingöl</option>
            <option value="Bitlis" <?php if($il1=="Bitlis"){ echo "selected='selected'"; }?>>Bitlis</option>
            <option value="Bolu" <?php if($il1=="Bolu"){ echo "selected='selected'"; }?>>Bolu</option>
            <option value="Bursa" <?php if($il1=="Bursa"){ echo "selected='selected'"; }?>>Bursa</option>
            <option value="Çanakkale" <?php if($il1=="Çanakkale"){ echo "selected='selected'"; }?>>Çanakkale</option>
            <option value="Çankırı" <?php if($il1=="Çankırı"){ echo "selected='selected'"; }?>>Çankırı</option>
            <option value="Çorum" <?php if($il1=="Çorum"){ echo "selected='selected'"; }?>>Çorum</option>
            <option value="Denizli" <?php if($il1=="Denizli"){ echo "selected='selected'"; }?>>Denizli</option>
            <option value="Diyarbakır" <?php if($il1=="Diyarbakır"){ echo "selected='selected'"; }?>>Diyarbakır</option>
            <option value="Düzce" <?php if($il1=="Düzce"){ echo "selected='selected'"; }?>>Düzce</option>
            <option value="Edirne" <?php if($il1=="Edirne"){ echo "selected='selected'"; }?>>Edirne</option>
            <option value="Elazığ" <?php if($il1=="Elazığ"){ echo "selected='selected'"; }?>>Elazığ</option>
            <option value="Erzincan" <?php if($il1=="Erzincan"){ echo "selected='selected'"; }?>>Erzincan</option>
            <option value="Erzurum" <?php if($il1=="Erzurum"){ echo "selected='selected'"; }?>>Erzurum</option>
            <option value="Eskişehir" <?php if($il1=="Eskişehir"){ echo "selected='selected'"; }?>>Eskişehir</option>
            <option value="Gaziantep" <?php if($il1=="Gaziantep"){ echo "selected='selected'"; }?>>Gaziantep</option>
            <option value="Giresun" <?php if($il1=="Giresun"){ echo "selected='selected'"; }?>>Giresun</option>
            <option value="Gümüşhane" <?php if($il1=="Gümüşhane"){ echo "selected='selected'"; }?>>Gümüşhane</option>
            <option value="Hakkari" <?php if($il1=="Hakkari"){ echo "selected='selected'"; }?>>Hakkari</option>
            <option value="Hatay" <?php if($il1=="Hatay"){ echo "selected='selected'"; }?>>Hatay</option>
            <option value="Iğdır" <?php if($il1=="Iğdır"){ echo "selected='selected'"; }?>>Iğdır</option>
            <option value="Isparta" <?php if($il1=="Isparta"){ echo "selected='selected'"; }?>>Isparta</option>
            <option value="İstanbul" <?php if($il1=="İstanbul"){ echo "selected='selected'"; }?>>İstanbul</option>
            <option value="İzmir" <?php if($il1=="İzmir"){ echo "selected='selected'"; }?>>İzmir</option>
            <option value="Kahramanmaraş" <?php if($il1=="Kahramanmaraş"){ echo "selected='selected'"; }?>>Kahramanmaraş</option>
            <option value="Karabük" <?php if($il1=="Karabük"){ echo "selected='selected'"; }?>>Karabük</option>
            <option value="Karaman" <?php if($il1=="Karaman"){ echo "selected='selected'"; }?>>Karaman</option>
            <option value="Kars" <?php if($il1=="Kars"){ echo "selected='selected'"; }?>>Kars</option>
            <option value="Kastamonu" <?php if($il1=="Kastamonu"){ echo "selected='selected'"; }?>>Kastamonu</option>
            <option value="Kayseri" <?php if($il1=="Kayseri"){ echo "selected='selected'"; }?>>Kayseri</option>
            <option value="Kilis" <?php if($il1=="Kilis"){ echo "selected='selected'"; }?>>Kilis</option>
            <option value="Kırklareli" <?php if($il1=="Kırklareli"){ echo "selected='selected'"; }?>>Kırklareli</option>
            <option value="Kırıkkale" <?php if($il1=="Kırıkkale"){ echo "selected='selected'"; }?>>Kırıkkale</option>
            <option value="Kırşehir" <?php if($il1=="Kırşehir"){ echo "selected='selected'"; }?>>Kırşehir</option>
            <option value="Kocaeli" <?php if($il1=="Kocaeli"){ echo "selected='selected'"; }?>>Kocaeli</option>
            <option value="Konya" <?php if($il1=="Konya"){ echo "selected='selected'"; }?>>Konya</option>
            <option value="Kütahya" <?php if($il1=="Kütahya"){ echo "selected='selected'"; }?>>Kütahya</option>
            <option value="Malatya" <?php if($il1=="Malatya"){ echo "selected='selected'"; }?>>Malatya</option>
            <option value="Manisa" <?php if($il1=="Manisa"){ echo "selected='selected'"; }?>>Manisa</option>
            <option value="Mardin" <?php if($il1=="Mardin"){ echo "selected='selected'"; }?>>Mardin</option>
            <option value="Mersin" <?php if($il1=="Mersin"){ echo "selected='selected'"; }?>>Mersin</option>
            <option value="Muğla" <?php if($il1=="Muğla"){ echo "selected='selected'"; }?>>Muğla</option>
            <option value="Muş" <?php if($il1=="Muş"){ echo "selected='selected'"; }?>>Muş</option>
            <option value="Nevşehir" <?php if($il1=="Nevşehir"){ echo "selected='selected'"; }?>>Nevşehir</option>
            <option value="Niğde" <?php if($il1=="Niğde"){ echo "selected='selected'"; }?>>Niğde</option>
            <option value="Ordu" <?php if($il1=="Ordu"){ echo "selected='selected'"; }?>>Ordu</option>
            <option value="Osmaniye" <?php if($il1=="Osmaniye"){ echo "selected='selected'"; }?>>Osmaniye</option>
            <option value="Rize" <?php if($il1=="Rize"){ echo "selected='selected'"; }?>>Rize</option>
            <option value="Sakarya" <?php if($il1=="Sakarya"){ echo "selected='selected'"; }?>>Sakarya</option>
            <option value="Samsun" <?php if($il1=="Samsun"){ echo "selected='selected'"; }?>>Samsun</option>
            <option value="Siirt" <?php if($il1=="Siirt"){ echo "selected='selected'"; }?>>Siirt</option>
            <option value="Sinop" <?php if($il1=="Sinop"){ echo "selected='selected'"; }?>>Sinop</option>
            <option value="Sivas" <?php if($il1=="Sivas"){ echo "selected='selected'"; }?>>Sivas</option>
            <option value="Şanlıurfa" <?php if($il1=="Şanlıurfa"){ echo "selected='selected'"; }?>>Şanlıurfa</option>
            <option value="Şırnak" <?php if($il1=="Şırnak"){ echo "selected='selected'"; }?>>Şırnak</option>
            <option value="Tekirdağ" <?php if($il1=="Tekirdağ"){ echo "selected='selected'"; }?>>Tekirdağ</option>
            <option value="Tokat" <?php if($il1=="Tokat"){ echo "selected='selected'"; }?>>Tokat</option>
            <option value="Trabzon" <?php if($il1=="Trabzon"){ echo "selected='selected'"; }?>>Trabzon</option>
            <option value="Tunceli" <?php if($il1=="Tunceli"){ echo "selected='selected'"; }?>>Tunceli</option>
            <option value="Uşak" <?php if($il1=="Uşak"){ echo "selected='selected'"; }?>>Uşak</option>
            <option value="Van" <?php if($il1=="Van"){ echo "selected='selected'"; }?>>Van</option>
            <option value="Yalova" <?php if($il1=="Yalova"){ echo "selected='selected'"; }?>>Yalova</option>
            <option value="Yozgat" <?php if($il1=="Yozgat"){ echo "selected='selected'"; }?>>Yozgat</option>
            <option value="Zonguldak" <?php if($il1=="Zonguldak"){ echo "selected='selected'"; }?>>Zonguldak</option>
</select>
       </td>
      </tr>
      <tr>
        <td>İlçe</td>
        <td>:</td>
        <td><input type="text"  name="ilce" value="<?php echo $ilce1; ?>" /></td>
      </tr>
     <tr>
        
        <td><input  type="submit" value="Güncelle" name="gonder"/></td>
      
       </tr>
     
        
  
      </tr>

    </table>
    </form>
<br/>

</div>
 
  <?php include("include/altmenu.php");?>
   

  
</div>


</body>
</html>

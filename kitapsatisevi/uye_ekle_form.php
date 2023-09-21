

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
  include("include/ayar2.php");
  include("include/ustmenu.php");
  include("include/yanmenu.php");
  
 ?>
   
    
   
    
    

  <div class="orta">
  <b> <h2 align="center" style="color:#000;">YENİ ÜYE</h2></b>
 
<table width="380" align="center" border="0"><tr><td colspan="2"><b>Üyelik Bilgileri</b></td></tr></table>
<table width="380" align="center" border="0">
<form action="" method="post"  enctype="multipart/form-data">
      <tr>
        <td width="139">Kullanıcı Adı*</td>
        <td width="8">:</td>
        <td width="219"><input  class="kutular" type="text" name="kullaniciadi" value="<?=$_POST[kullaniciadi]?>" /></td>
      </tr>
      <tr>
        <td width="139">E-posta*</td>
        <td width="8">:</td>
        <td width="219"><input class="kutular" type="text" name="eposta" value="<?=$_POST[eposta]?>" /></td>
      </tr>
      <tr><td colspan="4" style="color:#666">
    (Şifrenizi oluştururken türkçe karakter kullanmayınız. En az 8 karakterden oluşturunuz. Şifreniz sadece rakam ve harflerden oluşmasın)</td></tr></table>
      <table width="380" align="center" border="0">
      <tr>
        <td>Şifre*</td>
        <td>:</td>
        <td><input type="text"  name="sifre" value="<?=$_POST[sifre]?>" /></td>
      </tr>
      <tr>
        <td>Şifre tekrar*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="sifretekrar" value="<?=$_POST[sifretekrar]?>" /></td>
      </tr>
      <tr>
        <td>Ad*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="ad" value="<?=$_POST[ad]?>" maxlength="11" /></td>
      </tr>
      <tr>
        <td>Soyad*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="soyad" value="<?=$_POST[soyad]?>" maxlength="11" /></td>
      </tr>
      <tr>
        <td>Cinsiyet*</td>
        <td>:</td>
         <td>
         <select class="kutular" name="cinsiyet">
         <option value="bos">   </option>
           <option value="bayan">Bayan</option>
           <option value="bay">Bay</option>
          
         </select>
       </td>
      </tr>
      <tr>
        <td>Doğum Tarihi*</td>
        <td>:</td>
        <td><input type="date" class="kutular" name="dtarih" value="<?=$_POST[dtarih]?>"  /></td>
      </tr>
	    <tr>
        <td>Doğum Yeri*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="dyeri" value="<?=$_POST[dyeri]?>" /></td>
      </tr>
       <tr>
        <td>Eğitim*</td>
        <td>:</td>
        <td><select name="egitim" />
            <option> seçiniz </option>
            <option> İlkokul</option>
            <option> Ortaokul</option>
            <option> Lise</option>
            <option> Lisans</option>
             <option> Yükseklisans</option>
            </select></td>
        
      </tr>
      <tr>
        <td>Meslek*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="meslek" value="<?=$_POST[meslek]?>" /></td>
      </tr><tr></table>
      <table width="380" align="center" border="0"><tr><td colspan="2"><b>Adres Bilgilerim</b></td></tr>
      <tr>
      <td colspan="2" style="color:#666">
      (Üye olduktan sonra "Üyelik Bilgileri" sayfasından yeni adresler ekleyebilirsiniz)</td></tr></table>
      <table width="380" align="center" border="0">
      <tr>
        <td>Telefon*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="gsm" value="<?=$_POST[gsm]?>" maxlength="11" /></td>
      </tr>
      <tr>
      <td>Adres*</td>
      <td>:</td>
      <td colspan="2"><textarea name="adres" value="" cols="30" rows="5"></textarea></td>
      </tr>
        <tr>
       <td>İl*</td>
       <td>:</td>
       <td>
 <select class="kutular" name="il">
  <option value="bos">   </option>
<option value="Adana">Adana</option>
<option value="Adiyaman">Adıyaman</option>
<option value="Afyoonkarahisar">Afyonkarahisar</option>
<option value="Agri">Ağrı</option>
<option value="Aksaray">Aksaray</option>
<option value="Amasya">Amasya</option>
<option value="Ankara">Ankara</option>
<option value="Antalya">Antalya</option>
<option value="Ardahan">Ardahan</option>
<option value="Artvin">Artvin</option>
<option value="Aydin">Aydın</option>
<option value="Balikesir">Balıkesir</option>
<option value="Bartin">Bartın</option>
<option value="Batman">Batman</option>
<option value="Bayburt">Bayburt</option>
<option value="Bilecik">Bilecik</option>
<option value="Bingöl">Bingöl</option>
<option value="Bitlis">Bitlis</option>
<option value="Bolu">Bolu</option>
<option value="Burdur">Bursa</option>
<option value="Canakkale">Çanakkale</option>
<option value="Cankiri">Çankırı</option>
<option value="Corum">Çorum</option>
<option value="Denizli">Denizli</option>
<option value="Diyarbakir">Diyarbakır</option>
<option value="Düzce">Düzce</option>
<option value="Edirne">Edirne</option>
<option value="Elazig">Elazığ</option>
<option value="Erzincan">Erzincan</option>
<option value="Erzincan">Erzincan</option>
<option value="Erzurum">Erzurum</option>
<option value="Eskisehir">Eskişehir</option>
<option value="Gaziantep">Gaziantep</option>
<option value="Giresun">Giresun</option>
<option value="Gumushane">Gümüşhane</option>
<option value="Hakkari">Hakkari</option>
<option value="Hatay">Hatay</option>
<option value="Igdir">Iğdır</option>
<option value="Isparta">Isparta</option>
<option value="Istanbul">İstanbul</option>
<option value="Izmir">İzmir</option>
<option value="Kahramanmaras">Kahramanmaraş</option>
<option value="Karabük">Karabük</option>
<option value="Karaman">Karaman</option>
<option value="Kars">Kars</option>
<option value="Kastamonu">Kastamonu</option>
<option value="Kayseri">Kayseri</option>
<option value="Kilis">Kilis</option>
<option value="Kirklareli">Kırklareli</option>
<option value="Kirikkale">Kırıkkale</option>
<option value="Kirsehir">Kırşehir</option>
<option value="Kocaeli">Kocaeli</option>
<option value="Konya">Konya</option>
<option value="Kutahya">Kütahya</option>
<option value="Malatya">Malatya</option>
<option value="Manisa">Manisa</option>
<option value="Mardin">Mardin</option>
<option value="Mersin">Mersin</option>
<option value="Mugla">Muğla</option>
<option value="Mus">Muş</option>
<option value="Nevsehir">Nevşehir</option>
<option value="Nigde">Niğde</option>
<option value="Ordu">Ordu</option>
<option value="Osmaniye">Osmaniye</option>
<option value="Rize">Rize</option>
<option value="Sakarya">Sakarya</option>
<option value="Samsun">Samsun</option>
<option value="Siirt">Siirt</option>
<option value="Sinop">Sinop</option>
<option value="Sivas">Sivas</option>
<option value="Sanliurfa">Şanlıurfa</option>
<option value="Sirnak">Şırnak</option>
<option value="Tekirdag">Tekirdağ</option>
<option value="Tokat">Tokat</option>
<option value="Trabzon">Trabzon</option>
<option value="Tunceli">Tunceli</option>
<option value="Usak">Uşak</option>
<option value="Van">Van</option>
<option value="Yalova">Yalova</option>
<option value="Yozgat">Yozgat</option>
<option value="Zonguldak">Zonguldak</option>
</select>
       </td>
      </tr>
        <tr>
        <td>İlçe*</td>
        <td>:</td>
        <td><input type="text" class="kutular" name="ilce" value="<?=$_POST[ilce]?>" maxlength="11" /></td>
      </tr>
      <tr>
        <td>Gizli Soru*</td>
        <td>:</td>
        <td><select name="soru" id="soru" />
            <option>seçiniz</option>
            <option>Dedenizin mesleği nedir?</option>
            <option>Annenizin kızlık soyadı nedir?</option>
            <option>En sevdiğiniz renk hangisidir?</option>
            </select></td>
        
      </tr>
      <tr>
        <td>Gizli Cevap*</td>
        <td>:</td>
        <td><input type="text" class="kutular" value="<?=$_POST[cevap]?>" name="cevap" maxlength="11" /></td>
      </tr>
	  <td>Resiminizi Seçiniz *</td>
    <td>:</td>
    <td><input type="file" name="resim"  /></td>
  </tr>
     
        <tr>
        <td><input class="kutular" type="submit" value="Kaydet" name="gonder"/></td>
      </tr>
     
     
       <tr> 
  <td><input type="reset" value="Temizle"/></td>
      </tr>

    </table>
    </form>
  
<br/>
<?php 

//verileri formdan çekme
 $kullaniciadi      =       trim($_POST["kullaniciadi"]);
 $ad				=		trim($_POST["ad"]);
 $soyad				=		trim($_POST["soyad"]);
 $eposta			=		trim($_POST["eposta"]);
 $sifre				=		trim($_POST["sifre"]);
 $sifretekrar		=		trim($_POST["sifretekrar"]);
 $cinsiyet			=		trim($_POST["cinsiyet"]);
 $dtarih			=		trim($_POST["dtarih"]);
 $dyeri			    =		trim($_POST["dyeri"]);
 $egitim			=		trim($_POST["egitim"]);
 $meslek			=		trim($_POST["meslek"]);        
 $gsm			    =		trim($_POST["gsm"]);
 $adres			    =		trim($_POST["adres"]);
 $il			    =		trim($_POST["il"]);
 $ilce			    =		trim($_POST["ilce"]);
 $gonder			=		trim($_POST["gonder"]);
 $gizlisoru			=		trim($_POST["soru"]);
 $gizlicevap 		= 		trim($_POST["cevap"]);
//gerekli alanlar dolumu kontrol
$gerekli=(!empty($eposta) and !empty($kullaniciadi) and !empty($sifre) and !empty($sifretekrar) and !empty($ad) and !empty($soyad) and !empty($cinsiyet) and !empty($dtarih) and !empty($egitim) and !empty($meslek) and !empty($adres) and !empty($gsm) and !empty($gizlisoru) and !empty($gizlicevap));
//şifre kontrol
$a =preg_match("@[0-9]@",$sifre);
$b =preg_match("@[a-z]-[çÇğĞöÖüÜİ]@",$sifre);
$c =preg_match("@[A-Z]-[çÇğĞöÖüÜİ]@",$sifre);
$d =preg_match("@[.,?*=]@",$sifre);

$sonuc = "<ul>";
$hata= 0;

//kullanici kontrol
		 $sql="SELECT KullaniciAd FROM kullanici WHERE KullaniciAd='".$kullaniciadi."'";
         $result=mysql_query($sql);
         $kayitSayisi=@mysql_num_rows($result);
//eposta kontrolü
$epostakontrol=preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i', $eposta);
		//kaydete basarsa
if($_POST["gonder"]){   
       
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
                 //ŞİFRE KONTROLÜ
                 //şifreler eşitmi
                 if($sifre!=$sifretekrar){
		         $sonuc.= "<li>şifreler uyuşmuyo</li>";
				 $hata++;
				 }
				 //şifre karakteri
				 if(strlen($sifre) < 8 || strlen($sifre) > 16){
				 $sonuc .= "<li>parola 8 karakterden az veya 16 karakterden fazla</li>";
				 $hata++;
				 }
				 //şifre sayı kontrol
				 if(!$a){
				 $sonuc .= "<li>parola en az 1 adet sayı içermelidir</li>";
				 $hata++;
				 }
				 //şifre küçük harf kontrol
				 if(!$b){
				 $sonuc .= "<li>parola en az 1 adet küçük harf içermelidir Türkçe Karakter İçermemelidir ç-Ç-ğ-Ğ-ö-Ö-ü-Ü-İ </li>";
				 $hata++;
				 }
				 //şifre büyük harf kontrol
				 if(!$c){
				 $sonuc .= "<li>parola en az 1 adet büyük harf içermelidir Türkçe Karakter İçermemelidir ç-Ç-ğ-Ğ-ö-Ö-ü-Ü-İ </li>";
				 $hata++;
				 }
				 //şifre özel karakter kontrol
				if(!$d){
				 $sonuc  .= "<li>parola en az 1 adet özel karakter (. , ? * =) içermelidir</li>";
				 $hata++;
				 }
				 //ekleyerek satırları yazdırma
				$sonuc .= "</ul>";
				//hata varsa
				if ($hata > 0)
				{
					echo "<h3>Aşağıdaki $hata adet kuralı göz önünde bulundurunuz.</h3>";
					echo $sonuc;
				}
				//hata yoksa
				else{
				
				//veriler dolu ise ve kullanıcı adı kullanılmamış ve eposta kurallarına uyuyor ise
			   if(($gerekli) and !empty($gizlicevap) and ($kayitSayisi<1) and ($epostakontrol)){
	          
			
				
	//veritabanına yaz
	$islem=mysql_query("INSERT INTO kullanici(KullaniciAd,Ad,Soyad,Resim,Eposta,Sifre,Dtarih,Dyeri,Adres,il,ilce,Gsm,Cinsiyet,OgrenimDurumu,Meslek,GizliSoru,GizliCevap)
	 VALUES ('$kullaniciadi','$ad','$soyad',$yeni_ad','$eposta','$sifre','$dtarih','$dyeri','$adres','$il','$ilce','$gsm','$cinsiyet','$egitim','$meslek','$gizlisoru','$gizlicevap')");
	echo "e-posta adresi geçerli";
	echo "Kayıt tamamlandı :)";}
	  //kullanıcı adı önceden kullanılmış  ve eposta kurallarına uyuyor ise
	   elseif(($gerekli) and ($kayitSayisi>1) and ($epostakontrol))
	   {
		  echo '<h4>Belirttiğiniz kullanıcı adı sistemde kayıtlı.
					Lütfen başka bir tane deneyin.</h4>';
	 }
	 //eposta kurallarına uymuyor ise
	  elseif((!isset($gerekli)) and ($kayitSayisi<1) and ($epostakontrol))
	 {
		 echo"gerekli alanları doldurunuz";
	 }
	//veriler eksik ise
	else
	{echo "e-posta adresi geçerli değil";
	}}}
	else{
		echo "";
	}
				


?>
  </div>
  <?php include("include/altmenu.php");?>
  
</div>


</body>
</html>

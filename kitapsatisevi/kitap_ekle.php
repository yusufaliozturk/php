

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
if($_SESSION['Durum'] != 1){
        echo 'Bu sayfaya erisiminiz yok.';
		header("location:index.php");}
 include("include/ustmenu.php");?>
  <?php include("include/yanmenu.php");
  $eklelog=mysql_query("insert into log(idKullanici,Sayfa,Tarih) VALUES('$sid1','Kitap Ekleye Girdi','$tarihlog')");?>
   
    
  
  <div class="orta">
  <?php 
include("include/yoneticimenu.php");
if(isset($_POST['gonder'])){
 $kitapad 			=		trim($_POST["kitapad"]);
 $yazarad 			=		trim($_POST["yazarad"]);
 $yayinevi			=		trim($_POST["yayinevi"]);
 $btarih			=		trim($_POST["btarih"]);
 $adet				=		trim($_POST["adet"]);
 $fiyat				=		trim($_POST["fiyat"]);
 $tsuresi			=		trim($_POST["teslimat"]);
 $kategori			=		trim($_POST["kategori"]);
 $aciklama			=		trim($_POST["aciklama"]);
 $dosya_adi=$_FILES["resim"]["name"];
			//Dosyaya yeni bir isim oluþturuluyor
			$uret=array("as","rt","ty","yu","fg");
			$uzanti=substr($dosya_adi,-4,4);
			$sayi_tut=rand(1,10000);
			$yeni_ad="resim/".$uret[rand(0,4)].$sayi_tut.$uzanti;
			//Dosya yeni adýyla dosyalar klasörüne kaydedilecek
			if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
				echo 'Dosya başarıyla yüklendi.';
				
				
} 
$ekle=mysql_query("insert into kitaplar(KitapAd,YazarAd,YayinEvi,BasimTarihi,Adet,Fiyat,Resim,Aciklama,Kategori,TedarikSuresi) VALUES('$kitapad','$yazarad','$yayinevi','$btarih','$adet','$fiyat','$yeni_ad','$aciklama','$kategori','$tsuresi')");


if ($ekle){
					echo 'Veritabanına kaydedildi.';
				}else{
			 		echo 'Kayıt sırasında hata oluştu!';
				}
			}else{
				echo 'Dosya Yüklenemedi!';
			}
 	
?>
  
  <b> <h2 align="center" style="color:#000;">Kitap Ekle</h2></b>
 
<table width="380" align="center" border="0"><tr><td colspan="2"><b>
     Kitap Bilgileri</b>
  </td></tr>
      
      </table>
    <table width="380" align="center" border="0">
      <form action="" method="post" name="uye_ekle" enctype="multipart/form-data">
       <tr>
        <td>Kategori*</td>
        <td>:</td>
         <td>
         <select  name="kategori">
         <option value="bos">   </option>
           <option value="Bilim">Bilim</option>
           <option value="Edebiyat">Edebiyat</option>
           <option value="Sanat">Sanat</option>
           <option value="Sinema">Sinema</option>
           <option value="Tarih">Tarih</option>
           
          
         </select>
       </td>
      </tr>
      <tr>
        <td width="148">Kitap Ad</td>
        <td width="10">:</td>
        <td width="208"><input  type="text" value="" name="kitapad" /></td>
      </tr>
      <tr>
        <td width="148">Yazar Ad</td>
        <td width="10">:</td>
        <td width="208"><input  type="text" value="" name="yazarad" /></td>
      </tr>
      <tr>
        <td width="148">Yayın Evi</td>
        <td width="10">:</td>
        <td width="208"><input  type="text" value="" name="yayinevi" /></td>
      </tr>
      <tr>
        <td>Basım Tarihi</td>
        <td>:</td>
        <td><input type="date"  name="btarih" value="" /></td>
      </tr>
      <tr>
        <td>Adet</td>
        <td>:</td>
        <td><input type="int"  name="adet" value="" /></td>
      </tr>
      <tr>
        <td>Fiyat</td>
        <td>:</td>
        <td><input type="int"  name="fiyat" value="" /></td>
      </tr>
      <tr>
        <td>Teslimat Süresi</td>
        <td>:</td>
        <td><input type="int"  name="teslimat"  value="" /></td>
      </tr>
      <tr>
        <td>Resminizi seçiniz</td>
        <td>:</td>
        <td><input type="file" name="resim"/></td>
      </tr>
        <tr>
        <td>Açıklama</td>
        <td>:</td>
        <td><textarea  style=" height:100px; " name="aciklama" maxlength="255"  value="max 255 karakter"   ></textarea></td>
      </tr>
     <tr>
        
        <td><input  type="submit" value="Ekle" name="gonder"/></td>
      
       </tr>
     
        
  <td><input type="reset" value="Temizle"/></td>
      </tr>

    </table>
    </form>
    
<br/>

</div>
 
  <?php include("include/altmenu.php");?>
   

  
</div>


</body>
</html>

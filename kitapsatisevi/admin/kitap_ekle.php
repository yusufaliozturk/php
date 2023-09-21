

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<title>
	BinBiR Kitabevi 
</title>

<table width="380" align="center" border="0"><tr><td colspan="2"><b>
     Kitap Ekleme </b>
  </td></tr>
      </table>
    <table width="380" align="center" border="0">
      <form action="kitap_ekle.php" method="post"  enctype="multipart/form-data">
      <tr>
        <td width="148">Kitap Adı</td>
        <td width="10">:</td>
        <td width="208"><input type="text" name="kitapad" /></td>
      </tr>
      <tr>
        <td>Tür</td>
        <td>:</td>
        <td><select name="kategori">
    	       	<option value="bilim">Bilim</option>
        	   	<option value="felsefe">Felsefe</option>
         		<option value="macera">Macera</option>
         		<option value="din">Din</option>
           		<option value="muzik">Müzik</option>
           		<option value="sanat">Sanat</option>
         	</select></td>
      </tr>
      <tr>
        <td>Yayın Evi</td>
        <td>:</td>
        <td><input type="text" name="yayinevi"/></td>
      </tr>
      <tr>
        <td>Basım Tarihi</td>
        <td>:</td>
        <td><input type="date" name="basimtarihi" /></td>
      </tr>
      <tr>
        <td>Fiyat</td>
        <td>:</td>
        <td><input type="number" name="fiyat" /></td>
      </tr>
      <tr>
        <td>Teslimat Süresi</td>
        <td>:</td>
        <td><input type="text" name="tsuresi" /></td>
      </tr>
      <tr>
        <td>Resim</td>
        <td>:</td>
        <td><input type="file" name="resim" /></td>
      </tr>
      <tr>
        <td><input  type="reset" value="Temizle" /></td>
       <td><input  type="submit" value="Kaydet" name="gonder"/></td>
      
      </tr>
</table>

</form>

</head>
<body>
<?php
error_reporting(0);
include("../include/ayar.php");
include("../include/imageload.php");
include("../include/upload.php");
 $kitapad			=		trim($_POST["kitapad"]);
 $kategori			=		trim($_POST["kategori"]);
 $yayinevi			=		trim($_POST["yayinevi"]);
 $basimtarihi		=		trim($_POST["basimtarihi"]);
 $adet				=		trim($_POST["adet"]);
 $fiyat				=		trim($_POST["fiyat"]);
 $tsuresi			=		trim($_POST["tsuresi"]);

if($_POST["gonder"]){   
if($_FILES["resim"]["name"]) $resim=imageload("resim");
if(isset($kitapad) and isset($kategori) and isset($yayinevi) and isset($basimtarihi) and isset($adet) and isset($fiyat)   and isset($resim)){   

$ekle=mysql_query("INSERT INTO kitaplar(KitapAd,Kategori,YayinEvi,BasimTarihi,Adet,Fiyat,Resim,TedarikSuresi)   VALUES('$kitapad','$kategori','$yayinevi','$basimtarihi','$adet','$fiyat','$resim','$tsuresi')");
	   if($ekle){
		    echo " Kayıt işlemi tamamlandı...";
		   }else{
			echo " Sıkıntı oluştu...";   
			   }
	   }else{
		   echo " Kayıt işleminde hata oluştu...";
		   
		   }
}
?>


</body>
</html>

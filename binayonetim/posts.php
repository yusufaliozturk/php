<?php
session_start();
include 'bag.php';
$bag=bag();
mysqli_query($bag,"set names utf8");
$islem=$_GET['islem'];
switch($islem){

case 1:

	$hata="1";
	$bilgi=pathinfo($_FILES['resim']['name']);
	$resimad=$_POST['kullaniciadi'].".".$bilgi['extension'];

	if($_POST['sifre']!=$_POST['sifret']){
		$hata.="Şifreler Uyuşmuyor\n";
	}
		
	if(!move_uploaded_file($_FILES['resim']['tmp_name'],"profilresim/".$resimad)){
		$hata.="Dosya Yükleme Hatası\n";
	}

	if($hata==1){
	if(mysqli_query($bag,"insert into kullanicilar(ad,soyad,kullaniciAdi,sifre,eposta,telefon,unvanId,resim) 
	values(
	'".$_POST['ad']."',
	'".$_POST['soyad']."',
	'".$_POST['kullaniciadi']."',
	'".$_POST['sifre']."',
	'".$_POST['eposta']."',
	'".$_POST['telefon']."',
	'".$_POST['unvan']."',
	'".$resimad."')")){
	echo 1;
	}
	else{
		$hata.="Kullanıcı Adı Zaten Var\n";	
		echo $hata;
	}
	}

	else{
		echo $hata;
	}
	
break;

//***********************

case 2:
	
	$sec=mysqli_query($bag,'select * from kullanicilar where kullaniciAdi like "%'.$_POST['kullaniciad'].'%"');
	if(mysqli_num_rows($sec)>0){
		echo "<table class='table table-hover'>";
		echo "<tr><th>Profil Resmi</th><th>İsim</th><th>Soyisim</th><th></th><th></th></tr>";
		while($veri=mysqli_fetch_array($sec)){
			echo "<tr><td><img src='profilresim/".$veri['resim']."' style='width:50px;height:50px;'></td><td>".$veri['ad']."</td><td>".$veri['soyad']."</td><td><button onclick='kullget(".$veri['id'].")' class='btn btn-info'>Detaylı Bilgi</button></td><td><button onclick='kullsil(".$veri['id'].")' class='btn btn-danger'>Kullanıcıyı Sil</button></td></tr>";
		}
		echo "</table>";
	}
	else{
		echo "Kullanıcı Adı Bulunamamıştır Başka Bir İsim Deneyin!";
	}
	
break;

//***********************

case 3:
	$sec=mysqli_query($bag,'select * from kullanicilar inner join unvan on unvan.id=kullanicilar.unvanId where kullanicilar.id="'.$_POST['kullaniciid'].'"');
	$veri=mysqli_fetch_array($sec);
	echo $veri['ad']."-".$veri['soyad']."-".$veri['eposta']."-".$veri['telefon']."-".$veri['unvanAd']."-./profilresim/".$veri['resim']."-".$veri['kullaniciAdi'];
	
break;

//***********************

case 4:
		if(mysqli_query($bag,'delete from kullanicilar where id="'.$_POST['kullanicisil'].'"')){
				echo "Kullanıcı Başarıyla Silindi!";
		}
		else{
			echo "Kullanıcı Silme Hatası!!";
		}
		
break;

//***********************

case 5:
	
		if(mysqli_query($bag,'update kullanicilar set ad="'.$_POST['ad'].'", soyad="'.$_POST['soyad'].'", eposta="'.$_POST['eposta'].'",telefon="'.$_POST['telefon'].'" where kullaniciAdi="'.$_POST['kullaniciadi'].'"')){
				echo "Kullanıcı Bilgileri Güncellendi!";
		}
		
break;

//***********************

case 6:
	$baslik=str_replace("'","••",$_POST['duyurubaslik']);
	$icerik=str_replace("'","••",$_POST['duyuruicerik']);
	$tarih=date("Y-m-d H:i:s");
		if(mysqli_query($bag,"insert into duyurular(baslik,icerik,tarih) values('".$baslik."','".$icerik."','$tarih')")){
			echo "Duyuru Başarıyla Eklendi!";
		}
		else{
			echo mysqli_error($bag);
		}
break;

//***********************

case 7:
	
	$sec=mysqli_query($bag,'select * from duyurular where 1 order by id desc limit 5');
	if(mysqli_num_rows($sec)>0){
	
		while($veri=mysqli_fetch_array($sec)){
			$baslik=str_replace("••","'",$veri['baslik']);
			$icerik=str_replace("••","'",$veri['icerik']);
			echo "<div class='11u 11u(mobile) duyuru'><p class='duyurubaslik'>".$baslik."</p><p>".substr(strip_tags($icerik),0,100)."...</p>
													<button class='btn1 btn-primary' onclick='duyurudetay(".$veri['id'].")'>Devamını Oku</button></div>";	
		}
	}
	else{
		echo "<div class='11u 11u(mobile) duyuru'><p class='duyurubaslik'>Bilgilendirme</p><p>Şuanda Bir Duyuru Bulunmamaktadır.</p>
													</div>";	
	
	}
break;

//***********************

case 8:
	$sec=mysqli_query($bag,'select * from duyurular where id="'.$_POST['duyuruid'].'"');
	if(mysqli_num_rows($sec)>0){
	$veri=mysqli_fetch_array($sec);
	$baslik=str_replace("••","'",$veri['baslik']);
	$icerik=str_replace("••","'",$veri['icerik']);
	echo $baslik."*?".$icerik;		
	}
break;

//***********************

case 9:
	$sec=mysqli_query($bag,'select * from duyurular where 1 order by id desc');
	if(mysqli_num_rows($sec)>0){
		echo "<table class='table table-hover'>";
		echo "<tr><th>Duyuru Başlığı</th><th>Kısa İçerik</th><th>İşlem</th></tr>";
		while($veri=mysqli_fetch_array($sec)){
			echo "<tr><td>".str_replace("••","'",$veri['baslik'])."'</td><td>".substr(strip_tags(str_replace("••","'",$veri['icerik'])),0,50)."</td><td><button onclick='duyget(".$veri['id'].")' class='btn btn-info'>Detaylı Bilgi</button></td><td><button onclick='duysil(".$veri['id'].")' class='btn btn-danger'>Duyuruyu Sil</button></td></tr>";
		}
		echo "</table>";
	}
	else{
		
		echo "Bir Duyuru Bulunmamaktadır!";
	}
	
break;

//***********************


case 10:
	$tarih=date("Y-m-d H:i:s");
	$baslik=str_replace("'","••",$_POST['duyurubaslik']);
	$icerik=str_replace("'","••",$_POST['duyuruicerik']);
		if(mysqli_query($bag,"update duyurular set baslik='".$baslik."', icerik='".$icerik."', tarih='".$tarih."' where id='".$_POST['duyuruid']."'")){
				echo "Duyuru Bilgileri Güncellendi!";
		}
		else{
			echo mysqli_error($bag);
		}
break;

//***********************

case 11:
		if(mysqli_query($bag,"delete from duyurular where id='".$_POST['duyuruid']."'")){
				echo "Duyuru Bilgileri Silindi!";
		}
		else{
			echo mysqli_error($bag);
		}
break;

//***********************

case 12:
	if(mysqli_query($bag,"insert into daire(siteAdi,blok,daireNo,mahalle,ilce,il,dairetip) 
	values(
	'".$_POST['sitead']."',
	'".$_POST['blok']."',
	'".$_POST['daireno']."',
	'".$_POST['mahalle']."',
	'".$_POST['ilce']."',
	'".$_POST['il']."',
	'".$_POST['dairetip']."')")){
		$id=mysqli_insert_id($bag);
		mysqli_query($bag,"insert into sahiplik(kulid,daireId) values('".$_POST['dairesahip']."','$id')");
	echo 1;
	}
	else{
		echo "Daire Ekleme Başarısız!\n".mysqli_error($bag);
	}

break;

//***********************

case 13:
	$sec=mysqli_query($bag,'select * from daire inner join sahiplik on sahiplik.daireId=daire.daireId inner join kullanicilar on kullanicilar.id=sahiplik.kulid');
	if(mysqli_num_rows($sec)>0){
		echo "<table class='table table-hover'>";
		echo "<tr><th>Daire Adres</th><th>Sahibi</th><th></th><th></th></tr>";
		while($veri=mysqli_fetch_array($sec)){
			echo "<tr><td>".$veri['siteAdi']." sitesi "." Blok : ".$veri['blok']." No: ".$veri['daireNo']." ".$veri['mahalle']." mahallesi ".$veri['ilce']."/".$veri['il']."</td><td>".$veri['ad']." ".$veri['soyad']."</td><td><button class='btn btn-danger' onclick='kiraislem(".$veri['daireId'].")'>Kira İşlemleri</button></td><td><button class='btn btn-danger' onclick='dairesil(".$veri['daireId'].")'>Daire Sil</button></td></tr>";
		}
		echo "</table>";
	}
	else{
		echo "Henüz Bir Daire Bilgisi Sisteme Kayıt Edilmemiş!";
	}
	
break;

//***********************

case 14:

$sec=mysqli_query($bag,"select * from kullanicilar where kullaniciAdi='".$_POST['kullaniciadi']."' and sifre='".$_POST['sifre']."'");
if(mysqli_num_rows($sec)>0){
	$_SESSION['oturum']=mysqli_fetch_array($sec);
	echo 1;
}
else{
	echo 0;
}

break;

//***********************

case 15:

$sec=mysqli_query($bag,"select * from kullanicilar where unvanId > 1");
if(mysqli_num_rows($sec)>0){
	while($veri=mysqli_fetch_array($sec)){
		echo "<option value='".$veri['id']."'>".$veri['ad']." ".$veri['soyad']."</option>";
	}
}

break;

//***********************
case 16:

$sec=mysqli_query($bag,"select * from kullanicilar where unvanId = 1");
if(mysqli_num_rows($sec)>0){
	echo "
	<p>Kira Durumu : Boşta</p>
	<input type='text' id='did' style='display:none;' name='daireid' value=''>
	<p>Kullanıcı Seçin</p>
	<select name='kiraci'>";
	while($veri=mysqli_fetch_array($sec)){
		echo "<option value='".$veri['id']."'>".$veri['ad']." ".$veri['soyad']."</option>";
	}
	echo "</select><br><a href='kullaniciekle.php'>Yeni Kullanıcı Ekle</a><br><input type='submit' value='Kiraya Ver'>";
}
else{
	echo "<a href='kullaniciekle.php'>Yeni Kullanıcı Ekle</a>";
}

break;

//***********************
case 17:

$sec=mysqli_query($bag,"select * from kiraci where daireId = '".$_POST['daireid']."' and durum='1'");
if(mysqli_num_rows($sec)>0){
	$veri=mysqli_fetch_array($sec);
	$veri1=mysqli_query($bag,"select * from kullanicilar where id='".$veri['kulid']."'");
		$kullanici=mysqli_fetch_array($veri1);
echo $kullanici['ad']." ".$kullanici['soyad']."-".$kullanici['id'];
}
else{
echo "bos";
}

break;

//***********************
case 18:
$tarih=date("Y-m-d H:i:s");
if(mysqli_query($bag,"insert into kiraci(kulid,daireId,aidatMiktar,kiraMiktar,oturmaTarihi,durum) values('".$_POST['kiraci']."','".$_POST['daireid']."','-','-','$tarih','1')")){
	echo 1;
}
else{
	echo 0;
}


break;

//***********************
case 19:

if(mysqli_query($bag,"update kiraci set durum='0' where kulid='".$_POST['kulid']."' and daireId='".$_POST['daireid']."'")){
	echo "İşlem Başarılı!";
}
else{
	echo "İşlem Başarısız";
}


break;

//***********************
case 20:

if(mysqli_query($bag,"delete from daire where daireId='".$_POST['daireid']."'")){
	echo "İşlem Başarılı!";
}
else{
	echo "İşlem Başarısız";
}


break;

//***********************
case 21:
$sec=mysqli_query($bag,"select kiraci.kulid,kiraci.daireId,kullanicilar.ad,kullanicilar.soyad,daire.siteAdi,daire.blok,daire.daireNo,daire.mahalle from kiraci  inner join kullanicilar on kullanicilar.id=kiraci.kulid inner join daire on daire.daireId=kiraci.daireId where kiraci.durum='1'");
	$say=0;
	if(mysqli_num_rows($sec)>0){
		while($veri=mysqli_fetch_array($sec)){
			$sec2=mysqli_query($bag,"select * from odemeler where daireId='".$veri['daireId']."' and kulid='".$veri['kulid']."' and odemeDonemi>='".$_POST['donem']."'");
			if(!mysqli_num_rows($sec2)){
				$say+=1;
				echo "<option value='".$veri['kulid']."-".$veri['daireId']."'>".$veri['ad']." ".$veri['soyad']." - ".$veri['siteAdi']." sitesi, Blok : ".$veri['blok'].", Daire No : ".$veri['daireNo'].", ".$veri['mahalle']."</option>";
			}
		}
	}
	if($say==0){
			echo "<option value'#'=>Bu Ay Ödenecek Borçlu Bulunmamakta!!</option>";
	}


break;

//***********************
case 22:
if($_POST['odeyen']!='#'){
$odeyen=explode("-",$_POST['odeyen']);

if(mysqli_query($bag,"insert into odemeler(kulid,daireId,tur,odemeDonemi) values('".$odeyen[0]."','".$odeyen[1]."','".$_POST['odemetur']."','".$_POST['odemetarih']."')")){
		echo 1;
}
else{
	echo mysqli_error($bag);
}
}

break;

//***********************
case 23:
$say=0;
$sec=mysqli_query($bag,"select kiraci.kulid,kiraci.daireId,kullanicilar.ad,kullanicilar.soyad,daire.siteAdi,daire.blok,daire.daireNo,daire.mahalle from kiraci  inner join kullanicilar on kullanicilar.id=kiraci.kulid inner join daire on daire.daireId=kiraci.daireId where kiraci.durum='1'");
	$say=1;
	if(mysqli_num_rows($sec)>0){
		while($veri=mysqli_fetch_array($sec)){
				echo "<option value='".$veri['kulid']."-".$veri['daireId']."'>".$veri['ad']." ".$veri['soyad']." - ".$veri['siteAdi']." sitesi, Blok : ".$veri['blok'].", Daire No : ".$veri['daireNo'].", ".$veri['mahalle']."</option>";
			}
		}
	
	if($say==0){
			echo "<option value'#'=>Hiç Bir Kiracı Bilgisi Bulunmamakta!!</option>";
	}


break;

//***********************

case 24:


if($_POST['odemebil']!='#'){
$odeyen=explode("-",$_POST['odemebil']);

$sec=mysqli_query($bag,"select * from odemeler inner join kullanicilar on kullanicilar.id=odemeler.kulid where kulid='".$odeyen[0]."' and daireId='".$odeyen[1]."'");
	if(mysqli_num_rows($sec)>0){
		echo "<table class='table table-hover'><thead>
		<tr class='warning'><th>İsim Soyisim</th><th>Tarih</th><th>Ödeme Türü</th><th>Ödeme Durum</th></tr></thead><tbody>
		";
		while($veri=mysqli_fetch_array($sec)){
				$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
				echo "<tr><td>".$veri['ad']." ".$veri['soyad']."</td><td>".$tarih."</td><td>".$veri['tur']."</td><td class='success'>Ödendi</td></tr>";
				}
				echo "</tbody></table>";
		}
		
	
		
}
//***********************

case 25:
if($_SESSION['oturum']['unvanId']==1){
	$sec=mysqli_query($bag,"select * from odemeler where kulid='".$_SESSION['oturum']['id']."' and tur='kira' order by odemeDonemi asc");
	$sec2=mysqli_query($bag,"select * from odemeler where kulid='".$_SESSION['oturum']['id']."' and tur='aidat' order by odemeDonemi asc");

		if(mysqli_num_rows($sec)>0){
			echo "<table class='table table-hover'><thead>
			<tr class='warning'><th colspan='4'><h4>Kira Ödeme Bilgileri<h4></th></tr></thead><tbody>
			";
			while($veri=mysqli_fetch_array($sec)){
					$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
					echo "<tr><td>".$tarih."</td><td class='success'>Ödendi</td></tr>";
					}
					echo "</tbody></table>";
			}
			else{
				echo "<h3>Kira Ödeme Bilgisi Bulunamadı!</h3>";
			}
			if(mysqli_num_rows($sec2)>0){
			echo "<table class='table table-hover'><thead>
			<tr class='warning'><th colspan='4'>Aidat Ödeme Bilgileri</th></tr></thead><tbody>
			";
			while($veri=mysqli_fetch_array($sec)){
					$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
					echo "<tr><td>".$tarih."</td><td class='success'>Ödendi</td></tr>";
					}
					echo "</tbody></table>";
			}
			else{
				echo "<h3>Aidat Ödeme Bilgisi Bulunamadı!</h3>";
			}
}
if($_SESSION['oturum']['unvanId']==2){
	$sec=mysqli_query($bag,"select * from sahiplik inner join odemeler on odemeler.daireId=sahiplik.daireId inner join kullanicilar on kullanicilar.id=odemeler.kulid where sahiplik.kulid='1' and odemeler.tur='kira' order by odemeler.odemeDonemi asc,odemeler.kulid asc");
	$sec2=mysqli_query($bag,"select * from sahiplik inner join odemeler on odemeler.daireId=sahiplik.daireId inner join kullanicilar on kullanicilar.id=odemeler.kulid where sahiplik.kulid='1' and odemeler.tur='aidat' order by odemeler.odemeDonemi asc,odemeler.kulid asc");

		if(mysqli_num_rows($sec)>0){
			echo "<table class='table table-hover'><thead>
			<tr><th>Kiracı</th><th>Kiracı Telefon</th><th></th><th></th></tr></thead><tbody>
			";
			while($veri=mysqli_fetch_array($sec)){
					$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
					echo "<tr><td>".$veri['ad']." ".$veri['soyad']."</td><td>".$veri['telefon']."</td><td>$tarih</td><td class='success'>Ödendi</td></tr>";
					}
					echo "</tbody></table>";
			}
			else{
				echo "<h3>Kira Ödeme Bilgisi Bulunamadı!</h3>";
			}
			if(mysqli_num_rows($sec2)>0){
			echo "<table class='table table-hover'><thead>
			<tr><th>Kiracı</th><th>Kiracı Telefon</th><th></th><th></th></tr></thead><tbody>
			";
			while($veri=mysqli_fetch_array($sec)){
					$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
					echo "<tr><td>".$veri['ad']." ".$veri['soyad']."</td><td>".$veri['telefon']."</td><td>$tarih</td><td class='success'>Ödendi</td></tr>";
					}
					echo "</tbody></table>";
			}
			else{
				echo "<h3>Aidat Ödeme Bilgisi Bulunamadı!</h3>";
			}
}
if($_SESSION['oturum']['unvanId']==3){
	$sec=mysqli_query($bag,"select * from sahiplik inner join odemeler on odemeler.daireId=sahiplik.daireId inner join kullanicilar on kullanicilar.id=odemeler.kulid where  odemeler.tur='kira' order by odemeler.odemeDonemi asc,odemeler.kulid asc,sahiplik.kulid asc");
	$sec2=mysqli_query($bag,"select * from sahiplik inner join odemeler on odemeler.daireId=sahiplik.daireId inner join kullanicilar on kullanicilar.id=odemeler.kulid where  odemeler.tur='aidat' order by odemeler.odemeDonemi asc,odemeler.kulid asc,sahiplik.kulid asc");

		if(mysqli_num_rows($sec)>0){
			echo "<table class='table table-hover'><thead>
			<tr><th>KİRACI</th><th>KİRACI TELEFON</th><th></th><th></th></tr></thead><tbody>
			";
			while($veri=mysqli_fetch_array($sec)){
					$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
					echo "<tr><td>".$veri['ad']." ".$veri['soyad']."</td><td>".$veri['telefon']."</td><td>$tarih</td><td class='success'>Ödendi</td></tr>";
					}
					echo "</tbody></table>";
			}
			else{
				echo "<h3>Kira Ödeme Bilgisi BulunamadI!</h3>";
			}
			if(mysqli_num_rows($sec2)>0){
			echo "<table class='table table-hover'><thead>
			<tr><th>Kiracı</th><th>Kiracı Telefon</th><th></th><th></th></tr></thead><tbody>
			";
			while($veri=mysqli_fetch_array($sec)){
					$tarih=$veri['odemeDonemi'][0].$veri['odemeDonemi'][1].$veri['odemeDonemi'][2].$veri['odemeDonemi'][3]."-".$veri['odemeDonemi'][4].$veri['odemeDonemi'][5];
					echo "<tr><td>".$veri['ad']." ".$veri['soyad']."</td><td>".$veri['telefon']."</td><td>$tarih</td><td class='success'>Ödendi</td></tr>";
					}
					echo "</tbody></table>";
			}
			else{
				echo "<h3>Aidat Ödeme Bilgisi Bulunamadı!</h3>";
			}
}



break;

default :
echo "Geçersiz İstek";	
break;

}
?>
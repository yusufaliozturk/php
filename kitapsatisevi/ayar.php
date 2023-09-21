<?php session_start();
error_reporting(E_ALL ^ E_DEPRECATED); //0 değeri oluşan tüm hataları gizler.

$host="localhost";
$kadi="root";
$ksifre="root";
$vt="kitapsatisevi";
$baglanti=mysql_connect($host,$kadi,$ksifre)or die("sql e baglanilamadi".mysql_error());
$vtsec=mysql_select_db($vt,$baglanti)or die("vt ye baglanilamadi".mysql_error());
mysql_query("set name utf8");
mysql_query("set character set utf8");
mysql_query("set collection_connection= 'utf8_turkish_ci'");

function turkceKarakterVarmi($haystack, $needle=array("İ","ı","ğ","Ğ","ü","Ü","ş","Ş","ö","Ö","ç","Ç"), $offset=0)
{
    if(!is_array($needle)) $needle = array($needle);
    foreach($needle as $query) {
        if(strpos($haystack, $query, $offset) !== false) return true; // stop on first true result
    }
    return false;
}
function sayfaRaporEt($kulId, $aciklama)
{
	$sql="INSERT INTO sayfarapor(kulId, girisTarihi, aciklama) VALUES(".$kulId.", NOW(), '".$aciklama."')";
	@mysql_query($sql);
}

?>

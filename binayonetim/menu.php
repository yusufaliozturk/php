<?php

$yetki=$_SESSION['oturum']['unvanId'];
include 'bag.php';
$bag=bag();
mysqli_query($bag,"set names utf8");

$menuget=mysqli_query($bag,"select * from menu where duzey='1' and yetkiDuzey<='$yetki' order by id asc");
echo "<ul>";
while($menu=mysqli_fetch_array($menuget)){
	echo "<li><a href='".$menu['menuAdres']."'>".$menu['menuAd']."</a>";
	
	$altmenuget=mysqli_query($bag,"select * from menu where duzey='2' and ustMenu='".$menu['id']."' and yetkiDuzey<='$yetki' order by id asc");
	if(mysqli_num_rows($altmenuget)>0){
		echo "<ul>";
		while($altmenu=mysqli_fetch_array($altmenuget)){
		echo "<li><a href='".$altmenu['menuAdres']."'>".$altmenu['menuAd']."</a></li>";
		
		}
		echo "</ul>";		
	
	}
	echo "</li>";

}
echo "</ul>";


?>
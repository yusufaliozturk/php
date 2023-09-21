<?php
session_start();
if(isset($_SESSION['oturum'])){
	unset($_SESSION['oturum']);
}

header("Location:giris.php");

?>
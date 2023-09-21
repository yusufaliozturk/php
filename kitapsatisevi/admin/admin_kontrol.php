<?php

include("../ayar.php");

if(!isset($_SESSION["giris"]) || @$_SESSION["giris"]==false || @$_SESSION["tur"]<>"Admin")
{
	header('Location: ../index.php');
}

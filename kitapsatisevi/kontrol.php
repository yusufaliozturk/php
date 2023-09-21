<?php

include("ayar.php");

if(!isset($_SESSION["giris"]) || @$_SESSION["giris"]==false)
{
	header('Location: giris.php');
}


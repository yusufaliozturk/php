<?php include('admin_kontrol.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Paneli</title>
	<link href="../css/reset.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="admin-ana">
		<div class="admin-ust">
			<span class="sol">Hoşgeldin <?php echo $_SESSION["adi"]." ".$_SESSION["soyadi"]; ?></span>
			<span class="sag">
				<a href="../index.php">Siteye Git</a>
				<a href="../cikis.php">Çıkış</a>
			</span>
			<div id="clear"></div>
		</div>
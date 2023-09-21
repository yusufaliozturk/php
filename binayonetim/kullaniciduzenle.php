<?php include 'giriskont.php'; ?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
			<script src="js/jquery-1.10.2.min.js"></script> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<script src='js/jquery.min.js'></script>
	<script src='js/owl.carousel.js'></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
        
	</head>
	<body class="homepage">
		<div id="page-wrapper" >

			<!-- Header -->
				<div id="header-wrapper" style='background:#585450'>
					<div id="header">

						<!-- Logo -->
						
							<h1><a href="index.html">Bina Yönetimi Otomasyon</a></h1>
						
						<!-- Nav -->
							<nav id="nav">
								<?php include 'menu.php'; ?>
							</nav>

				</div>
				</div>
							<section id="intro" class="container" >
								<div class="row">
								<form id='frm' class='8u -2u -1u(mobile) 10u(mobile)'  enctype='multipart/form-data'>
								<input id='ad' name='ad' type='text' class='form-control bilgigiris'  placeholder='Ad'>
								<input id='soyad' name='soyad' type='text' class='form-control bilgigiris'  placeholder='Soyad'>
								<input id='kullaniciadi' readonly name='kullaniciadi' type='text' class='form-control bilgigiris'  placeholder='Kullanıcı Adı'>
								<input id='eposta' name='eposta' type='email' class='form-control bilgigiris' placeholder='E-posta Adresi'>
								<input id='telefon' name='telefon' type='tel' class='form-control bilgigiris' placeholder='Telefon'>
								<b style='color:black;'>Profil Resmi:</b>
								<div class='12u'>
								<img id='profilresim' src='' style='width:100px;height:100px;'><br>
								</div>
								<input id='verigonder' type='submit' value='Düzenlemeyi Kaydet'>
								</form>
								</div>
							</section>
							<div id='gelen'>
							</div>
					
				
		<!-- Scripts -->
		<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<script>

var id=$(location).attr("search").split('=');
kullget(id[1]);
function kullget(id){
		  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=3',
  		data:{"kullaniciid":id},
  		success:function(cevap){
			var bol=cevap.split('-');
			$('#profilresim').attr("src",bol[5]);
			$('#ad').val(bol[0]);
			$('#soyad').val(bol[1]);
			$('#kullaniciadi').val(bol[6]);
			$('#eposta').val(bol[2]);
			$('#telefon').val(bol[3]);
			
			}
			
			});

	}

$('#frm').submit(function(event){
    // var formData = $('#frm').serializeArray();
	event.preventDefault();
	var fd = new FormData($(this)[0]);    
	
  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=5',
  		data:fd,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
  		success:function(cevap){
				alert(cevap);
				window.location.replace("./index.php");
			}	
  	});
  });

</script>

<style>
.tablo{
margin-top:20px;
}
.duyurubaslik{
text-align:left;
padding-left:20px;
padding-top:10px;
font-size:2em;
font-family:arial;
font-weight:bold;
}
.btn1{
position:absolute;
width:91.666%;
bottom:0;
left:0;
}
.owl-carousel{
padding-bottom:50px;
}
#duyurular{
font-size:2em;
color:white;
background:#428bca;
}

.duyuru{
cursor:move;
height:12em;
background:#fdfdff;
border-radius:15px;
}
.bilgigiris{
	margin-top:5px;
}

body{
background:#EBEBE4;
}
#intro{
margin-top:10px;
}

#verigonder{
margin-top:5px;
background:#428bca;
}
<style>

	</body>
</html>


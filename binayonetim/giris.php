<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
			<script src="js/jquery-1.10.2.min.js"></script> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<script src='js/jquery.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
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
						
							<h1><a href="">Bina Yönetimi Otomasyon</a></h1>
						
						<!-- Nav -->
						
				</div>
				</div>
							<section id="intro" class="container" >
							<hr>
								<div id='cerceve' class='4u -4u -1u(mobile) 10u(mobile)'>
								<div id='girispanel'>Kullanıcı Giriş Paneli</div><hr>
								<form id='frm'>
								<input type='text' name='kullaniciadi' class='form-control' placeholder='Kullanıcı Adı'><br>
								<input type='password' name='sifre' class='form-control' placeholder='Şifre'><br>
								<input type='submit' id='giris' value='Giriş'>
								</form>
								<div id='hata'>Kullanıcı Adı veya Şifre Hatalı!</div>
								</div>
							</section>
					
					

					
				
		<!-- Scripts -->
		<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		
<script>
$('#hata').hide();
$('#frm').submit(function(event){
    // var formData = $('#frm').serializeArray();
	event.preventDefault();
	var fd = new FormData($(this)[0]);
	
  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=14',
  		data:fd,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
  		success:function(cevap){
			if(cevap==1){
				window.location.replace("./index.php");
			}
			else{
				alert(cevap);
				$('#hata').show();
			}
		}	
  	});
  });




</script>

<style>
#hata{
	color:red;
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
#giris{
	background:#428bca !important;
	color:white !important;
}
#girispanel{
	font-size:1.5em;
	padding-bottom:5px;
	padding-top:5px;
	background:#428bca !important;
	color:white !important;
}
#cerceve{
	background:white !important;
	border-radius:10px;
	padding:10px;
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

body{
background:#EBEBE4;
}
#intro{
margin-top:10px;
}
<style>
	</body>
</html>


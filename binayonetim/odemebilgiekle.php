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
								
								<form id='frm' class='12u 12u(mobile)'  enctype='multipart/form-data'>
								<div class='col-md-4 blok'>
								<p class='bg bg-primary'>Ödeyen Bilgisi</p>
								<select id='odeyen' name='odeyen' class='form-control bilgigiris'></select>
								</div>
								<div class='col-md-4 blok'>
								<p class='bg bg-primary'>Ödeme Tipi</p>
								<select  name='odemetur' class='form-control bilgigiris'><option value='kira'>Kira</option><option value='aidat'>Aidat</option></select>
								</div>
								<div class='col-md-4 blok'>
								<p class='bg bg-primary'>Ödenecek Dönem</p>
								<select id='odemetarih' name='odemetarih' class='form-control bilgigiris'></select>
								</div>
								</div>
								<input id='verigonder' type='submit' value='Kaydet'>
							
								</form>
								</div>
							</section>
		


	
				
		<!-- Scripts -->
		<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<script>

var aylar=["Ocak",
"Şubat",
"Mart",
"Nisan",
"Mayıs",
"Haziran",
"Temmuz",
"Ağustos",
"Eylül",
"Ekim",
"Kasım",
"Aralık"];

$(document).ready(function(){
	var tarihicerik="";
	var d= new Date();
	var ay=d.getMonth();
	var yil=d.getFullYear();
	var yay=ay < 10 ? "0"+ ay : ay;
	var yay2="";
	tarihicerik=tarihicerik + "<option value='" + yil  + yay +"'>Şimdiki Ay</option>";
	var i=0;
	for (i=ay;i<12;i++){
		yay2=i<10?"0"+i:i;
		tarihicerik=tarihicerik + "<option value='" + yil  + yay2 +"'>"+ aylar[i] + "/" + yil +"</option>";
	}
	$('#odemetarih').html(tarihicerik);
	
	$.ajax({ 
			type:'post',
			url:'./posts.php?islem=21',
			data:{"donem":yil + yay},
			success:function(cevap){
				$('#odeyen').html(cevap);
			}	
		});
});


$('#frm').submit(function(event){
    // var formData = $('#frm').serializeArray();
	event.preventDefault();
	var fd = new FormData($(this)[0]);
	
  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=22',
  		data:fd,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
  		success:function(cevap){
			if(cevap==1){
				alert("İşlem Başarılı");
				
			}
			else{
				alert(cevap);
			}
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


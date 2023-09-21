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
								<input name='sitead' type='text' class='form-control bilgigiris '  placeholder='Site Adı'>
								<input name='blok' type='text' class='form-control bilgigiris '  placeholder='Blok'>
								<input name='daireno' type='text' class='form-control bilgigiris '  placeholder='Daire No'>
								<input name='mahalle' type='text' class='form-control bilgigiris ' placeholder='Mahalle'>
								<input name='ilce' type='text' class='form-control bilgigiris ' placeholder='İlçe'>
								<input name='il' type='text' class='form-control bilgigiris ' placeholder='İl'>
								<select name='dairetip' class='form-control bilgigiris'><option value='0'>Daire Tipi Seçin</option><option value='1'>Dükkan</option><option value='2'>Ev</option></select>
								<select id='sahip' name='dairesahip' class='form-control bilgigiris'></select>
								<input id='verigonder' type='submit' value='Kaydet'>
							
								</form>
								</div>
							</section>
							<div id='gelen'>
	
	</div>

<div id="model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kira İşlemleri</h4>
      </div>
      <div class="modal-body">
       <div id='icerik'>
	   
	   </div>
      </div>
      <div class="modal-footer">
        <a id='duyduzenle' href='duyuruduzenle.php'><button type="button" class="btn btn-warning">Düzenle</button></a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
      </div>
    </div>

  </div>
</div>
	
				
		<!-- Scripts -->
		<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
<script>
$('.owl-carousel').owlCarousel({
autoplay:true,
items:1,
loop:true,
nav:true,
dotsEach:true
});

$(document).ready(function(){
$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=15',
  		data:1,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
  		success:function(cevap){
			$('#sahip').html(cevap);
		}	
  	});
});

$('#frm').submit(function(event){
    // var formData = $('#frm').serializeArray();
	event.preventDefault();
	var fd = new FormData($(this)[0]);
	
  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=12',
  		data:fd,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
  		success:function(cevap){
			if(cevap==1){
				alert("İşlem Başarılı");
				document.getElementById("frm").reset();
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


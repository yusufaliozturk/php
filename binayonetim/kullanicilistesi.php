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
	<script src='js/bootstrap.min.js'></script>
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
									<div class='4u -4u'>
									<input  id='kullaniciadi' type='text' class='form-control' placeholder='Kullanıcı İsmi Girin' onkeyup='kullanicikont(event)'>
									</div>
									<div id='tablo' class='-1u 10u'>
		
									</div>
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
        <h4 class="modal-title">Kullanıcı Bilgileri</h4>
      </div>
      <div class="modal-body">
       <div>
	   <img src='' id='kullresim' style='width:200px;height:200px;'>
	   </div>
	   <p>İsim : <span id='kullisim'></span></p>
	   <p>Soyisim : <span id='kullsoyisim'></span></p>
	   <p>Ünvan : <span id='kullunvan'></span></p>
	   <p>E-posta : <span id='kulleposta'></span></p>
	   <p>Telefon : <span id='kulltel'></span></p>
      </div>
      <div class="modal-footer">
        <a id='kullduzenle' href='kullaniciduzenle.php'><button type="button" class="btn btn-warning">Düzenle</button></a>
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

$('#frm').submit(function(event){
    // var formData = $('#frm').serializeArray();
	event.preventDefault();
	var fd = new FormData($(this)[0]);    
	
  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=1',
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
  
function kullanicikont(e){
	if($('#kullaniciadi').val().length >=3){
		  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=2',
  		data:{"kullaniciad":$('#kullaniciadi').val()},
  		success:function(cevap){
			$('#tablo').html(cevap);
			}
			
			});
	}
	
	}
	
	
	$('#model').modal('hide');
	
	function kullget(id){
		  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=3',
  		data:{"kullaniciid":id},
  		success:function(cevap){
			var bol=cevap.split('-');
			$('#kullduzenle').attr("href","kullaniciduzenle.php?id=" + id);
			$('#kullresim').attr("src",bol[5]);
			$('#kullisim').html(bol[0]);
			$('#kullsoyisim').html(bol[1]);
			$('#kullunvan').html(bol[4]);
			$('#kulleposta').html(bol[2]);
			$('#kulltel').html(bol[3]);
			$('#model').modal('show');
			}
			
			});
		
		

		
	}
	
	
	function kullsil(id){
			if(confirm("Devam ederseniz kullanıcı veritabanından kalıcı olarak silinecektir!")){
				$.ajax({ 
				type:'post',
				url:'./posts.php?islem=4',
				data:{"kullanicisil":id},
				success:function(cevap){
				kullanicikont();
				alert(cevap);
				}
			
				});
			}
			
			}
			

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


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
						
							<h1><a href="index.html">Bina Yönetimi Otomasyon</a></h1>
						
						<!-- Nav -->
							<nav id="nav">
								<?php include 'menu.php'; ?>
							</nav>

				</div>
				</div>
							<section id="intro" class="container" >
								<div class="row">
								<p id='duyurular' class='12u 12u(mobile)'><span class='glyphicon glyphicon-bullhorn'></span> Duyurular</p>
									<div  id='duyuruslayt' class='owl-carousel owl-theme 12u 12u(mobile)'>										
										
										<div class="11u 11u(mobile) duyuru"><p class='duyurubaslik'>Başlık</p><p>1 Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<button class='btn1 btn-primary'>Devamını Oku</button></div>
										
										<div class="11u 11u(mobile) duyuru"><p class='duyurubaslik'>Başlık</p><p>2 Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<button class='btn1 btn-primary'>Devamını Oku</button></div>
										
										<div class="11u 11u(mobile) duyuru"><p class='duyurubaslik'>Başlık</p><p>3 Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
													<button class='btn1 btn-primary'>Devamını Oku</button></div>
									
									</div>
								</div>
							</section>
					
					
<div id="model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id='duybaslik' class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <div id='duyicerik'>
      </div>
      <div class="modal-footer">
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

$(document).ready(function(){
	  	$.ajax({ 
  		type:'post',
  		url:'./posts.php?islem=7',
  		data:1,
  		success:function(cevap){
			
			$('#duyuruslayt').html(cevap);
					$('.owl-carousel').owlCarousel({
					autoplay:true,
					items:1,
					loop:true,
					nav:true,
					dotsEach:true
					});
			}
			
			});
	
});

$('#model').modal('hide');
function duyurudetay(id){
				$.ajax({ 
				type:'post',
				url:'./posts.php?islem=8',
				data:{"duyuruid":id},
				success:function(cevap){
				var duybol=cevap.split("*?");
				$('#duybaslik').html(duybol[0]);
				$('#duyicerik').html(duybol[1]);
				$('#model').modal('show');
				}
			
				});
			}
			
			


</script>

<style>
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

body{
background:#EBEBE4;
}
#intro{
margin-top:10px;
}
<style>
	</body>
</html>


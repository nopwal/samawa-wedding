<?php
if(empty($_GET['link'])){
		$cekid="salah";
		include "../koneksi.php";
		$db=new database();
		$demo=1;
		$pria = "Romeo";
		$wanita = "Juliete";
		$panggilan_pria = "Romeo";
		$panggilan_wanita = "Juliete";
	}else{
		$link = $_GET['link'];
		$data = $db->ambil_data_pengantin($link);
		
		if ($data){
			$cekid="ok";
			$demo=0;
			foreach($data as $data_){
				$idclient = $data_['idclient'];
				$foto_pria = $data_['foto_pria'];
				$foto_wanita = $data_['foto_wanita'];
				$pria = $data_['pria'];
				$wanita = $data_['wanita'];
				$panggilan_pria = $data_['panggilan_pria'];
				$panggilan_wanita = $data_['panggilan_wanita'];
				$ayah_pria = $data_['ayah_pria'];
				$ibu_pria = $data_['ibu_pria'];
				$ayah_wanita = $data_['ayah_wanita'];
				$ibu_wanita = $data_['ibu_wanita'];
				$tgl = $data_['tgl'];
				$jam_ijab = $data_['jam_ijab'];
				$jam_resepsi = $data_['jam_resepsi'];
				$tempat = $data_['tempat'];
			}
			//echo print_r($data_cek);
		}else{
			$cekid = "kosong";
			header("location:../index.php");
		}
		
			if(isset($_POST['kirim_ucapan']))
			{
				//$nisn = $_POST['nisn_data'];
				$nama_pengirim = $_POST['nama'];
				$doa = $_POST['doa'];
				
				$pesan = $db->kirim_ucapan($link,$nama_pengirim,$doa);
				if($pesan)
				{
				  header("location:index.php?pesan=".$pesan);
				}
			}
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Samawa | <?php echo $panggilan_pria." &amp; ".$panggilan_wanita; ?></title>
	<!-- Favicon  -->
    <link rel="icon" href="home/images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/bootstrap.css">
	<!-- bootstrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php if($demo==0){echo "$idtema/";} ?>css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>	
	<div class="fh5co-loader"></div>
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.php">Samawa<strong>.</strong></a></div>
				</div>
			</div>
		</div>
	</nav>

	<!-- Header Undangan -->
	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(<?php if($demo==0){echo "$idtema/";} ?>images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<!-- data css di atas di hapus data-stellar-background-ratio="0.5" -->
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h2>Undangan Pernikahan</h2>
							<h1><?php echo $panggilan_pria." &amp; ".$panggilan_wanita; ?></h1>
							<h2>Kami akan menikah</h2>
							<!-- <div class="simply-countdown simply-countdown-one"></div> -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<!-- Salam Pembuka -->
	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</h2>
					<p>Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan, dengan rahmat & ridho-Nya perkenankan kami menikahkan putra-putri kami:</p>
					<h3><?php echo date('l, d F Y', strtotime($tgl)); ?>, <?php echo $tempat ?></h3>
					
				</div>
			</div>
			<div class="couple-wrap animate-box">
				<div class="couple-half">
					<div class="groom">
						<img src="foto/<?php echo $foto_pria?>" alt="fotopria" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3><?php echo $pria?></h3>
						<p>Putra dari <?php echo $ayah_pria ?> dan <?php echo $ibu_pria?></p>
					</div>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
					<div class="bride">
						<img src="foto/<?php echo $foto_wanita?>" alt="fotowanita" class="img-responsive">
					</div>
					<div class="desc-bride">
						<h3><?php echo $wanita?></h3>
						<p>Putri dari <?php echo $ayah_wanita ?> dan <?php echo $ibu_wanita?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tempat dan Waktu Acara -->
	<div id="fh5co-event" class="fh5co-bg" style="background-image:url(<?php if($demo==0){echo "$idtema/";} ?>images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Acara Kami</span>
					<h2>Waktu dan Tempat Acara</h2>
				</div>
			</div>
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>Akad Nikah</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span><?php echo $jam_ijab?>-<br>Selesai</span>
										<!-- <span>6:00 PM</span> -->
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span><?php echo date('l, d F Y', strtotime($tgl)); ?></span><br>
										<!-- <span>November, 2016</span> -->
									</div>
									<div class="event-col-12 text-center">
										<p style="">Bertempat Di : <br><?php echo $tempat?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>Resepsi</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span><?php echo $jam_resepsi?>-<br>Selesai</span>
										<!-- <span>12:00 AM</span> -->
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span><?php echo date('l, d F Y', strtotime($tgl)); ?></span><br>
									</div>
									<div class="event-col-12 text-center">
										<p style="">Bertempat Di : <br><?php echo $tempat?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Galeri Foto -->
	<div id="fh5co-gallery" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<!-- <span>Our Memories</span> -->
					<h2>Galeri foto</h2>
					<!-- <p>Photo-photo kebahagian kami yang kami kenang selalu.</p> -->
					<span>Photo-photo kebahagian kami yang kami kenang selalu.</span>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-12">
					<ul id="fh5co-gallery-list">
						
						<li class="one-third " data-animate-effect="fadeIn" style="background-image: url(<?php if($demo==0){echo "$idtema/";} ?>images/gallery-1.jpg); "> 
						<a href="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-13.jpg">
							<div class="case-studies-summary">
								<span>Photo Prewedding</span>
								<!-- <h2>Two Glas of Juice</h2> -->
							</div>
						</a>
					</li>

					<li class="one-third " data-animate-effect="fadeIn" style="background-image: url(<?php if($demo==0){echo "$idtema/";} ?>images/gallery-2.jpg); ">
						<a href="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-2.jpg">
							<div class="case-studies-summary">
								<span>Photo Prewedding</span>
								<!-- <h2>Timer starts now!</h2> -->
							</div>
						</a>
					</li>

					<li class="one-third " data-animate-effect="fadeIn" style="background-image: url(<?php if($demo==0){echo "$idtema/";} ?>images/gallery-3.jpg); ">
						<a href="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-3.jpg">
							<div class="case-studies-summary">
								<span>Photo Prewedding</span>
								<!-- <h2>Beautiful sunset</h2> -->
							</div>
						</a>
					</li>
					<li class="one-third " data-animate-effect="fadeIn" style="background-image: url(<?php if($demo==0){echo "$idtema/";} ?>images/gallery-4.jpg); ">
						<a href="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-4.jpg">
							<div class="case-studies-summary">
								<span>Photo Prewedding</span>
								<!-- <h2>Company's Conference Room</h2> -->
							</div>
						</a>
					</li>
						<li class="one-third " data-animate-effect="fadeIn" style="background-image: url(<?php if($demo==0){echo "$idtema/";} ?>images/gallery-5.jpg); ">
							<a href="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-5.jpg">
								<div class="case-studies-summary">
									<span>Photo Prewedding</span>
									
								</div>
							</a>
						</li>

						<li class="one-third " data-animate-effect="fadeIn" style="background-image: url(<?php if($demo==0){echo "$idtema/";} ?>images/gallery-6.jpg); ">
							<a href="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-6.jpg">
								<div class="case-studies-summary">
									<span>Photo Prewedding</span>
									
								</div>
							</a>
						</li>
					</ul>		
				</div>
			</div>
		</div>
	</div>

	<!-- Kolom Form Do'a / Ucapan -->
	<div id="fh5co-started" class="fh5co-bg" style="background-image:url(<?php if($demo==0){echo "$idtema/";} ?>images/img_bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Ucapan dan Do'a</h2>
					<p style="color: white;">Silahkan isi kolom Nama dan kolom Ucapan. Terimakasih.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1">
					<form class="form-inline" action="" method="POST">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="name" class="sr-only">Name</label>
								<input style="background-color: black;" type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="email" class="sr-only">Doa</label>
								<!-- <textarea class="form-control" id="doa" name="doa" rows="4"></textarea> -->
								<input style="background-color: black;" type="text" class="form-control" id="doa" name="doa" placeholder="Doa/Ucapan" required>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<button type="submit" class="btn btn-default btn-block" name="kirim_ucapan">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- protokol kesehatan -->
	<div id="fh5co-protocol">
		<div class="halo">
			<h2><u>Tetap Patuhi Protokol Kesehatan</u></h2>
		</div>
		<div class="text-center">
			<img src="<?php if($demo==0){echo "$idtema/";} ?>images/masker.png" >
			<img src="<?php if($demo==0){echo "$idtema/";} ?>images/distance.png" >
			<img src="<?php if($demo==0){echo "$idtema/";} ?>images/salam.png" >
			<img src="<?php if($demo==0){echo "$idtema/";} ?>images/wash.png">
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<!-- <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>  -->
						<small class="block">&copy; Created with <i class="bi bi-heart-fill text-danger"></i> by Muhammad Naufal Irfani.</small>
						<small class="block">Kelas XII RPL. SMKN 6 SKA 2019</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="<?php if($demo==0){echo "$idtema/";} ?>js/main.js"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

	</body>
</html>


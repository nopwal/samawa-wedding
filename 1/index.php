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
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wedding Theme-1</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
    </noscript>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
    </noscript>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php if($demo==0){echo "$idtema/";} ?>images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php if($demo==0){echo "$idtema/";} ?>images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php if($demo==0){echo "$idtema/";} ?>images/favicon/favicon-16x16.png">
    <link href="<?php if($demo==0){echo "$idtema/";} ?>css/bootstrap.min.css?ver=1.1.0" rel="stylesheet">
    <link href="<?php if($demo==0){echo "$idtema/";} ?>css/font-awesome/css/all.min.css?ver=1.1.0" rel="stylesheet">
    <link href="<?php if($demo==0){echo "$idtema/";} ?>css/aos.css?ver=1.1.0" rel="stylesheet">
    <link href="<?php if($demo==0){echo "$idtema/";} ?>css/ekko-lightbox.css?ver=1.1.0" rel="stylesheet">
    <link href="<?php if($demo==0){echo "$idtema/";} ?>css/main.css?ver=1.1.0" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
  </head>
  <body id="top">
    <header></header>
    <div class="page-content">
      <div class="div">

<div class="ww-home-page" id="home">
  <div class="ww-wedding-announcement d-flex align-items-center justify-content-start">
    <div class="container ww-announcement-container">
      <p class="ww-couple-name ww-title" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000"><?php echo $panggilan_pria." &amp; ".$panggilan_wanita; ?></p>
      <img class="img-fluid mt-1" src="<?php if($demo==0){echo "$idtema/";} ?>images/laurel-1.png" alt="Heart" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000"/>
      <p class="h2 mt-5 ww-title" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="10"><?php echo date('d F Y', strtotime($tgl)); ?></p>
    </div>
  </div>
</div>

<div class="ww-section" id="couple">
  <div class="container">
    <h1 class="text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</h1>
    <p class="text-center" >Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan, dengan rahmat & ridho-Nya perkenankan kami menikahkan putra-putri kami:</p>
    <div class="row text-center">
      <div class="col-md-6">
        <div class="mt-3" border-radius: 200px;
    -webkit-border-radius: 200px;
    -moz-border-radius: 200px;><img  class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/groom.jpg" alt="Groom" data-aos="flip-left" data-aos-duration="1000"/>
          <!-- <p class="pt-3 text-left text-muted">Hi I am Raymond,Lorem ipsum dolor sit amet consectetur adipiscing, elit nulla enim arcu dictum lobortis, ac congue non hendrerit accumsan. Ut penatibus litora platea mi mus tempus eros proin, maecenas hac eget hendrerit inceptos per tempor sodales, id varius nulla commodo augue lectus pulvinar. Etiam suscipit leo sollicitudin vivamus tempor himenaeos vitae mattis dictum posuere, tincidunt aenean litora aptent facilisis eu est gravida.</p>-->
          <br><br>
          <p class="h4">Putra dari <?php echo $ayah_pria ?> dan <?php echo $ibu_pria?></p>
		  <h3 class="h2 ww-title"><?php echo $pria; ?></h3>
          <div class="ww-social-links">
            <a class="btn btn-link" href="#">
              <i class="fab fa-facebook-f" aria-hidden="true"></i>
            </a>
            <a class="btn btn-link" href="#">
              <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-link" href="#">
              <i class="fab fa-google-plus-g" aria-hidden="true"></i>
            </a>
            <a class="btn btn-link" href="#">
              <i class="fab fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mt-3"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/bride.jpg" alt="Bride" data-aos="flip-right" data-aos-duration="1000"/>
          <!-- <p class="pt-3 text-left text-muted">Hi I am Susan,Lorem ipsum dolor sit amet consectetur adipiscing, elit nulla enim arcu dictum lobortis, ac congue non hendrerit accumsan. Ut penatibus litora platea mi mus tempus eros proin, maecenas hac eget hendrerit inceptos per tempor sodales, id varius nulla commodo augue lectus pulvinar. Etiam suscipit leo sollicitudin vivamus tempor himenaeos vitae mattis dictum posuere, tincidunt aenean litora aptent facilisis eu est gravida.</p>-->
          <br><br>
          <p class="h4">Putra dari <?php echo $ayah_pria ?> dan <?php echo $ibu_pria?></p>
		  <h3 class="h2 ww-title"><?php echo $wanita; ?></h3>
          <div class="ww-social-links">
            <a class="btn btn-link" href="#">
              <i class="fab fa-facebook-f" aria-hidden="true"></i>
            </a>
            <a class="btn btn-link" href="#">
              <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-link" href="#">
              <i class="fab fa-google-plus-g" aria-hidden="true"></i>
            </a>
            <a class="btn btn-link" href="#">
              <i class="fab fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="ww-section bg-light" id="events">
  <div class="container ww-wedding-event">
    <h2 class="h1 text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Acara Pernikahan</h2>
    <div class="row">
      <div class="  col-md-7 col-sm-12">
        <div class="my-3">
          <div class="h4">Akad Nikah</div>
          <ul>
            <li><i class="text-muted fas fa-map-marker-alt"></i><span class="pl-2 text-muted"><?php echo $tempat; ?></span></li>
            <li class="pt-2"><i class="text-muted far fa-calendar-alt"></i><span class="pl-2 text-muted"><?php echo date('d F Y', strtotime($tgl)); ?></span></li>
            <li class="pt-2">Jam : <?php echo $jam_ijab; ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 col-sm-12">
        <div class="my-3">
          <div class="h4">Resepsi</div>
          <ul>
            <li><i class="text-muted fas fa-map-marker-alt "></i><span class="pl-2 text-muted"><?php echo $tempat; ?></span></li>
            <li class="pt-2"><i class="text-muted far fa-calendar-alt "></i><span class="pl-2 text-muted"><?php echo date('d F Y', strtotime($tgl)); ?></span></li>
            <li class="pt-2">Jam : <?php echo $jam_resepsi; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="ww-section bg-light" id="gallery">
  <div class="ww-photo-gallery">
    <div class="container">
      <h2 class="h1 text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Photo Gallery</h2>
      <div class="col-md-12 text-center ww-category-filter mb-4"><a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="all">All</a>
        <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="vacation">Our Vacation
        </a>
        <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="party">Party
        </a>
        <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="ceremony">Ceremony
        </a>
        <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="wedding">Wedding
        </a>
      </div>
      <div class="ww-gallery" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="0">
        <div class="card-columns">
          <div class="card " data-groups="[&quot;vacation&quot;,&quot;ceremony&quot;]">
            <a href="images/gallery-pic-1.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-1.jpg" ></a>
          </div>
          <div class="card" data-groups="[&quot;party&quot;,&quot;wedding&quot;]">
            <a href="images/gallery-pic-2.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-2.jpg" ></a>
          </div>
          <div class="card" data-groups="[&quot;vacation&quot;]">
            <a href="images/gallery-pic-3.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-3.jpg" ></a>
          </div>
          <div class="card" data-groups="[&quot;party&quot;,&quot;vacation&quot;]">
            <a href="images/gallery-pic-4.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-4.jpg" ></a></div>
          <div class="card" data-groups="[&quot;vacation&quot;]">
            <a href="images/gallery-pic-5.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-5.jpg" ></a></div>
          <div class="card" data-groups="[&quot;wedding&quot;,&quot;ceremony&quot;,&quot;party&quot;]">
            <a href="images/gallery-pic-6.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-6.jpg" ></a></div>
          <div class="card" data-groups="[&quot;vacation&quot;]">
            <a href="images/gallery-pic-7.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-7.jpg" ></a></div>
          <div class="card" data-groups="[&quot;wedding&quot;,&quot;party&quot;]">
            <a href="images/gallery-pic-8.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="<?php if($demo==0){echo "$idtema/";} ?>images/gallery-pic-8.jpg" ></a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="ww-section ww-rsvp-detail text-white" id="rsvp">
  <div class="container" data-aos="zoom-in-up" data-aos-duration="1000">
    <div class="col text-center">
      <h2 class="h1 ww-title pb-3" data-aos="zoom-in-down" data-aos-duration="1000">Kirim Ucapan / Doa</h2>
    </div>
    <div class="row ww-rsvp-form">
      <div class="col-md-10">
        <div class="card-body">
          <form action="" method="POST">
            <div class="row">
              <div class="col md-6 pb-3">
                <div class="form-group">
                  <label for="name-input">Nama Anda</label>
                  <input class="form-control" id="nama" type="text" name="nama" maxlength="40" required="required"/>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="message-input">Isi Ucapan / Doa</label>
                  <textarea class="form-control" id="doa" name="doa" rows="4"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <button class="btn btn-primary btn-submit" name="kirim_ucapan" type="submit">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="ww-footer bg-light">
  <div class="container text-center py-4">
    <p class="my-0"><?php echo $db->footer(); ?></p>
  </div>
</div></div>
    </div>
    <footer></footer>
    <script src="<?php if($demo==0){echo "$idtema/";} ?>scripts/jquery.min.js?ver=1.1.0"></script>
    <script src="<?php if($demo==0){echo "$idtema/";} ?>scripts/bootstrap.bundle.min.js?ver=1.1.0"></script>
    <script src="<?php if($demo==0){echo "$idtema/";} ?>scripts/aos.js?ver=1.1.0"></script>
    <script src="<?php if($demo==0){echo "$idtema/";} ?>scripts/ekko-lightbox.min.js?ver=1.1.0"></script>
    <script src="<?php if($demo==0){echo "$idtema/";} ?>scripts/main.js?ver=1.1.0"></script>
  </body>
</html>
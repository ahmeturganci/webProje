<?php
require_once("baglan.php");
?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Yazılımdan Bi Haber </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/plugins/morris.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

	<div id="wrapper">


		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Yazılımdan Bi Haber </a>

			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-right top-nav">
					<li class="dropdown">
						<a href="#" ><i class="fa fa-facebook"></i></b></a>
					</li>
					<li>
						<a href="#" ><i class="fa fa-twitter"></i></b></a>
					</li>
					<li>
						<a href="#" ><i class="fa fa-google"></i></b></a>
					</li>
					<li>
						<li><a href="login.php"><?php session_start();
						if(isset($_SESSION['nick'])){$nick=$_SESSION['nick']; echo $nick.' ';} ?><i class="glyphicon glyphicon-cog"></i></a>
						</li>
					</li>
				</ul>

				<ul class="nav navbar-nav side-nav">
					<li class="active">
						<a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> Anasayfa</a>
					</li>
					<li>
						<a href="calismalar.php"><i class="glyphicon glyphicon-briefcase"></i>  Çalışmalar</a>
					</li>
					<li>
						<a href="hakkımızda.php"><i class="glyphicon glyphicon-info-sign"></i>  Hakkımızda</a>
					</li>
					<li>
						<a href="iletisi.php"><i class="glyphicon glyphicon-phone"></i>  İletişim</a>
					</li>

				</ul>
			</div>
		</nav>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="fa fa-info-circle"></i>  <strong>Çalışmalarımız </strong> 
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
				<div class="col-lg-12">
				<h1>Çalışmalarımız</h1>
				<h2>MAYE çocuklar için kodlamaya merhaba</h2>
				<p>
					7-8 Mayıs 2016 tarihlerinde Korino Co-working Space'te, “Google Developers Days Hackingfest” adlı hackathon serisinin İzmir ayağında, Celal Bayar Üniversitesi, Hasan Ferdi Turgutlu Teknoloji Fakültesi, Yazılım Mühendisliği öğrencileri; Ahmet URGANCI, Ertuğrul ÜNGÖR, Mehmet Emin GELMEDİ ve Yasin DUVARCI 40 saat süresince uyumadan geliştirdikleri “Maye” isimli yazılım projeleriyle jüri tarafından puanlanarak 2.lik elde ettiler. Öğrencimizi kutlar, başarılarının devamını dileriz.
					<p>Maye isimli projenin amacı küçük yaşlarda yazılım geliştirme ve kodlamaya meraklı çocuklar için HTML CSS JS gibi Web programlama dillerini çocukların severek ve eğlenerek öğrenmesini sağlamaktır. Bu amaçla basit bulmaca eşleştirme tabanlı bir Android yazılım projesi geliştirilmiştir.</p>
				</p>
				<img src="http://yazilimmuh.cbu.edu.tr/db_images/site_134/web/HackingFest.jpg" class="img-responsive">
				<h3>Uygulamamızdan görüntüler</h3>
				<div>
					<img src="img/sunu.jpg" class="img-responsive">
				</div>

				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-lg-12">
				
				<h2>MEGAU MP3 Player</h2>
				<p>
					Halen üzerşnde çalışmakta olduğumuz android plaformu için mp3 çalar
				</p>
				

				</div>
				</div>
				</div>
			
		</div>
			<center>
				<nav>
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						
						<li>

							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</center>
			<footer  >  <center>
				<div style="color:white; align:center;  position: relative;margin: auto;">
					<p >Hazırlayan: megau</p>
					<p style="color:white;">İletişim İçin: <a href="mailto:megau@gmail.com">
						megau@gmail.com</a>.</p>
					</div>
				</center>
			</footer>

			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>


		</body>

		</html>

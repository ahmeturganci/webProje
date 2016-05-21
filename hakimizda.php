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
						<li><a href="giris.php"><?php session_start();
							if(isset($_SESSION['nick'])){$nick=$_SESSION['nick']; echo $nick.' ';} ?><i class="glyphicon glyphicon-cog"></i></a>
						</li>
					</li>
				</ul>

				<ul class="nav navbar-nav side-nav">
					<li>
						<a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> Anasayfa</a>
					</li>
					<li>
						<a href="calismalar.php"><i class="glyphicon glyphicon-briefcase"></i>  Çalışmalar</a>
					</li>
					<li>
						<a href="hakimizda.php"><i class="glyphicon glyphicon-info-sign"></i>  Hakkımızda</a>
					</li>
					<li>
						<a href="iletisim.php"><i class="glyphicon glyphicon-phone"></i>  İletişim</a>
					</li>

				</ul>
			</div>
		</nav>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="fa fa-info-circle"></i>  <strong>Hakkımızda</strong> 
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row" style="background:#f1f1f1; padding: 20px;">
					<div class="col-lg-6">
						<h1>Mehmet Emin GELMEDİ</h1>
						<img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/p/6/005/074/1b6/0f8d7ec.jpg" class="img-responsive" height="148" width=" 148"><br>
						<a href="#" ><i class="fa fa-facebook"></i></a>
						<a href="#" ><i class="fa fa-twitter"></i></a>
						<a href="#" ><i class="fa fa-github"></i></a>
						<p>	Celal Bayar Yazılım Mühendisliği 2.Sınıf Öğrencisi.</p>
						
						

					</div>
					<div class="col-lg-6">
						<h1>Ahmet URGANCI</h1>
						<img src="https://media.licdn.com/media/AAEAAQAAAAAAAAZ3AAAAJDQ0YzgxNGUwLWI2ZDMtNDcxMC05MWQ0LWYzNzhiMjM5YmMwNg.jpg" class="img-responsive"><br>
						<a href="#" ><i class="fa fa-facebook"></i></a>
						<a href="http://www.twitter.com/bayyazilimci" ><i class="fa fa-twitter"></i></a>
						<a href="http://www.github.com/ahmeturganci" ><i class="fa fa-github"></i></a>
						<p>	Celal Bayar Yazılım Mühendisliği 2.Sınıf Öğrencisi.</p>
						<li>Grafik ve Tasarım</li>
						<li>UI & UX</li>
						<li>Oyun ve Oyun Tasarımı</li>
						<li>JS</li>
						
					</div>

				</div>
			</div>
			<hr>
			

			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>


		</body>

		</html>

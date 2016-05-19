<?php 	
require_once("baglan.php");
$id=$_GET['id'];
/*unset($_SESSION['id']);
unset($_SESSION['baslik']);
unset($_SESSION['yazar']);
unset($_SESSION['aciklama']);
unset($_SESSION['icerik']);
unset($_SESSION['et']);
$_SESSION['id']=NULL;
$_SESSION['baslik']=NULL;
$_SESSION['icerik']=NULL;
$_SESSION['yazar']=NULL;
$_SESSION['aciklama']=NULL;
$_SESSION['et']=NULL;

	$_SESSION['id']=$id;
			$_SESSION['baslik']=$baslik;
			$_SESSION['icerik']=$icerik;
			$_SESSION['yazar']=$yazar;
			$_SESSION['aciklama']=$aciklama;
			$_SESSION['et']=$eklemetarihi;
*/
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
									<li><a href="login.php"><?php
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

					<div class="container-fluid">
						<?php
						$sql = 'SELECT * FROM yazi WHERE Id='.$id;
						$sorgu = $db->query($sql, PDO::FETCH_ASSOC);
						if (!empty($sorgu) AND $sorgu->rowCount() > 0){
							foreach( $sorgu as $sonuc ){
								$id=$sonuc['Id'];
								$baslik=$sonuc['Baslik'];
								$icerik=$sonuc['Icerik'];
								$aciklama=$sonuc['Aciklama'];
								$yazar=$sonuc['Yazar'];
								$eklemetarihi=$sonuc['eklemeTarihi'];
							}
							echo '<div class="row">
						<div class="col-lg-12">
						<h1>'.$baslik.'</h1><p>
						<b>  Yazar : </b>'.$yazar.' 
						<b> Ekleme Tarihi :</b>'.$eklemetarihi.'</b>

						<p>'.$aciklama.'</p> '.$icerik.' 
						</p>

						</div>
						</div>
						<hr>';
						}
						?>	
						<center>	
							<h4>Yorum Ekle</h4>
						</center>
						<div class="row">
							<div class="col-lg-12">

								<form method="post" action="index.php">
									<div class="form-group">
										<label>Mail</label>
										<input class="form-control" name="baslik">
									</div>

									<div class="form-group">
										<label>Yorum</label>
										<textarea class="form-control" name="icerik" rows="-2"></textarea>
									</div>
								</form>
								<button class="btn btn-primary">Gönder</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">		

							<footer  >  
								<center>
									<div >  
										<p >Hazırlayan: megau</p>
										<p style="">İletişim İçin: <a href="mailto:megau@gmail.com">
											megau@gmail.com</a>.</p>
										</div>
									</center>
								</footer> 

								<script src="js/jquery.js"></script>
								<script src="js/bootstrap.min.js"></script>


							</body>

							</html>

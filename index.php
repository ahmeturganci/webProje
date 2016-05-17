<?php
require_once("baglan.php");
$yaziSayisi=5;
$sql = mysqli_query($con,'SELECT COUNT(*) AS toplamYazi FROM yazi');
$sonuc = mysqli_fetch_assoc($sql);
$toplamYazi = $sonuc['toplamYazi'];

$toplamSayfa = ceil($toplamYazi / $yaziSayisi);


$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;
if($id<1) $id=1;
if($id>$toplamSayfa) $id=$toplamSayfa;

$limit=($id-1)*$yaziSayisi;
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
						<a href="#"><i class="glyphicon glyphicon-dashboard"></i> Anasayfa</a>
					</li>
					<li>
						<a href="#"><i class="glyphicon glyphicon-briefcase"></i>  Çalışmalar</a>
					</li>
					<li>
						<a href="#"><i class="glyphicon glyphicon-info-sign"></i>  Hakkımızda</a>
					</li>
					<li>
						<a href="#"><i class="glyphicon glyphicon-phone"></i>  İletişim</a>
					</li>

				</ul>
			</div>
		</nav>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="fa fa-info-circle"></i>  <strong>Yazılımdan sende bi haber olmak istiyor isen </strong> Bizi Sosyal medya hesaplarımızdan takibe başla.
					</div>
				</div>
			</div>
			<?php
			$sql = mysqli_query($con,'SELECT * FROM yazi LIMIT ' . $limit . ', ' . $yaziSayisi);
			while($sonuc = mysqli_fetch_assoc($sql)) {
				$baslik=$sonuc['Baslik'];
	//$icerik=$sonuc['icerik'];
				$aciklama=$sonuc['Aciklama'];
				$yazar=$sonuc['Yazar'];
				$eklemetarihi=$sonuc['eklemeTarihi'];
				echo '<div class="container-fluid">
				<div class="row">
				<div class="col-lg-12">
				<h1>'.$baslik.'</h1>
				<p><b>  Yazar : </b>'.$yazar.'<b> Ekleme Tarihi :</b> '.$eklemetarihi.'
				<p>'.$aciklama.'</p>
				<button class="btn btn-primary">Devamını Oku . . .</button>
				</div>
				</div>
				<hr>
				</div>';
			}
			mysqli_close($con);
			?>
			<center>
				<nav>
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<?php 
						for ($i=1; $i<=$toplamYazi ; $i++) { 
							echo "<li><a href='index.php?id={$i}'>{$i}</a></li>";
						}
						?>
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

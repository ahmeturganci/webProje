<?php 	
require_once("baglan.php");
$id=$_GET['id'];
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
						<li><a href="giris.php"><?php
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
					echo '<div class="row" style="background:#f1f1f1; padding: 10px;">
					<div class="col-lg-12">
						<p style="color:#888;"><i style="color:#E71D36;">  Yazar : </i>'.$yazar.'<i style="color:#E71D36;"> Ekleme Tarihi :</i> '.$eklemetarihi.'</p>
						<h1>'.$baslik.'</h1><p>
						

						<p>'.$aciklama.'</p> '.$icerik.' 
					</p>

				</div>
			</div>
			<hr>';
		}

		$sql ='SELECT * FROM yorum WHERE yaziId='.$id;
		$sorgu =$db->query($sql,PDO::FETCH_ASSOC);
		if (!empty($sorgu) AND $sorgu->rowCount() > 0){
			foreach( $sorgu as $sonuc ){
				$gelenMail=$sonuc['Mail'];
				$gelenYorum=$sonuc['Yorum'];
				$geleneklemeTarihi=$sonuc['eklemeTarihi'];

				echo '<div class="row" style="background:#f1f1f1; padding: 10px;">
				<div class="col-lg-12">
					
					<p style="color:#888; size:10px;"><i style="color:#5D8BF9;">  Yorum Sahibi : </i>'.$gelenMail.'<i style="color:#5D8BF9;"> Ekleme Tarihi :</i> '.$geleneklemeTarihi.'</p>
					<p><i>'.$gelenYorum.'</i></p>
				</div>
			</div>
			<hr/>';
		}
	}
	
	?>	
	
	<div class="row" style="background:#f1f1f1; padding: 10px;">
		<h2>Yorum Ekle</h2>
		<div class="col-lg-12">
			<form method="post">
				<div class="form-group">
					<label>Mail</label>
					<input type="email" name="yorumEmail" id="inputEmail" class="form-control" placeholder="E-Mail">
				</div>

				<div class="form-group">
					<label>Yorum</label>
					
					<textarea type="email" name="yorumYorum" id="inputEmail" class="form-control" placeholder="Yorumunuz"></textarea>

				</div>
				<button name="yorumKaydet" class="btn btn-primary">Gönder</button>
			</form>
		</div>
	</div>
	<?php
	if($_POST){
		date_default_timezone_set('Europe/Istanbul');
		$yorumeklemeTarihi=date("d-m-Y H:i:s");
		$yorumEmail=$_POST['yorumEmail'];
		$yorumYorum=$_POST['yorumYorum'];
		$sorgu = $db->prepare("INSERT INTO yorum SET
			yaziId = ?,
			Mail = ?,
			Yorum = ?,
			eklemeTarihi = ?");
		$ekle = $sorgu->execute(array(
			$id,$yorumEmail,$yorumYorum,$yorumeklemeTarihi
			));
		if ($ekle){
			header ("Location:post.php?id=".$id);
			
		}
	}
	?>
</div>
	

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

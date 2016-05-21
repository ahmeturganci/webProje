<?php 
require_once("baglan.php");
session_start();


if(!isset($_SESSION['nick'])){
}
else
{
	$nick=$_SESSION['nick'];
}

$id=@$_GET['id'];

?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Güncelleme</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" name="nick"><i class="fa fa-user"></i></b> <?php echo $nick;?> </a>
				</li>
			</ul>
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
				<ul class="nav navbar-nav side-nav">
					<li>
						<a href="index.php"><i class="glyphicon glyphicon-home"></i> Site Görüntüle</a>
					</li>
					<li>
						<a href="yonetici.php"><i class="glyphicon glyphicon-plus"></i> Yazı Ekle</a>
					</li>
					<li>
						<a href="yorumlar.php"><i class="glyphicon glyphicon-comment"></i>  Yorumlar</a>
					</li>
					<li>
						<a href="yazilar.php"><i class="glyphicon glyphicon-list-alt"></i> Yazılar</a>
					</li>
					<li>
						<a href="guncelle.php"><i class="glyphicon glyphicon-transfer"></i>  Güncellemeler</a>
					</li>
					<li>
						<a href="cikis.php"><i class="glyphicon glyphicon-log-out" name="cikis"></i>  Çıkış  </a>
					</li>

				</ul>
			</div>
		</nav>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="fa fa-info-circle"></i>  <strong>Yazı Güncelleme </strong>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="container-fluid">
					<?php 	



					$sql = 'SELECT * FROM yazi WHERE Id='.$id;
					$sorgu = $db->query($sql, PDO::FETCH_ASSOC);
					if (!empty($sorgu) AND $sorgu->rowCount() > 0){
						foreach( $sorgu as $sonuc ){
					;
							$yeniBaslik=$sonuc['Baslik'];
							$yeniIcerik=$sonuc['Icerik'];
							$yeniAciklama=$sonuc['Aciklama'];

								echo $id. ' '.$yeniAciklama.' '. $yeniBaslik;

						}

						echo '<script>alert("'.$yeniBaslik.'")</script>';
						$sorgu = "UPDATE yazi SET Baslik='$yeniBaslik',Aciklama='$yeniAciklama',Icerik='$yeniIcerik' WHERE Id =".$id;
						$sorgu = $db->query($sql, PDO::FETCH_ASSOC);

						echo '<script>alert("'.$yeniBaslik.'")</script>';
						
							if (!empty($sorgu) AND $sorgu->rowCount() > 0){
							echo '<script>alert("Başarılı bir şekilde")</script>';
						}else{
							echo 'Güncelleme işlemi başarısız';


						}
					}


					?>



				</div>
				<script src="js/jquery.js"></script>
				<script src="js/bootstrap.min.js"></script>


			</body>
			</html>
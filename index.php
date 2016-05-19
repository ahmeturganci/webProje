<?php
require_once("baglan.php");
session_start();
$yaziSayisi=5;
$sql = 'SELECT COUNT(*) AS toplamYazi FROM yazi';
$sonuc = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
if ($sonuc){
	$toplamYazi = $sonuc['toplamYazi'];
}
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
	<title>Yazılımdan Bi Haber - Anasayfa </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/plugins/morris.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	function Idgonder(id) {
		javascript: location = "post.php?id="+id;
	}
	</script>
</head>

<body>

	<div id="wrapper">


		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle 	</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Yazılımdan Bi Haber </a>

			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-right top-nav">
					<li class="dropdown">
						<a href="#	" ><i class="fa fa-facebook"></i></b></a>
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
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="fa fa-info-circle"></i>  <strong>Yazılımdan sende bi haber olmak istiyor isen </strong> Bizi Sosyal medya hesaplarımızdan takibe başla.
				</div>
			</div>
		</div>
		<?php
		$sql = 'SELECT * FROM yazi ORDER BY Id DESC LIMIT ' . $limit . ', ' . $yaziSayisi;
		$sorgu = $db->query($sql, PDO::FETCH_ASSOC);
		if (!empty($sorgu) AND $sorgu->rowCount() > 0){
			foreach( $sorgu as $sonuc ){
				$id=$sonuc['Id'];
				$baslik=$sonuc['Baslik'];
				$icerik=$sonuc['Icerik'];
				$aciklama=$sonuc['Aciklama'];
				$yazar=$sonuc['Yazar'];
				$eklemetarihi=$sonuc['eklemeTarihi'];
				echo '<div class="container-fluid">
				<div class="row">
				<div class="col-lg-12">
				<h1>'.$baslik.'</h1>
				<p><b>  Yazar : </b>'.$yazar.'<b> Ekleme Tarihi :</b> '.$eklemetarihi.'
				<p>'.$aciklama.'</p>
				<a class="btn btn-primary" onclick="Idgonder('.$id.');" >Devamını Oku. . .</a>
				</div>
				</div>
				<hr>
				</div>';
			}
		}
		?>		
	</div>
	<center>
		<nav>
			<ul class="pagination">
				<!--bi üdahale lazım-->
				<?php
				for ($i=1; $i<=$toplamYazi; $i+5) {
					echo "<li><a href='index.php?id={$i}'>{$i}</a></li>";
				}
				?>

			</ul>
		</nav>
	</center>
	<footer  >  <center>
		<div>
			<p >Hazırlayan: megau</p>
			<p>İletişim İçin: <a href="mailto:megau@gmail.com">
				megau@gmail.com</a>.</p>
			</div>
		</center>
	</footer>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>

</html>

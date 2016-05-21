<?php 
require_once("baglan.php");
session_start();
if(!isset($_SESSION['nick'])){
}
else
{
    $nick=$_SESSION['nick'];
}



$yaziSayisi=10;
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
    <title>Yazılar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
    	function Idgonder(id) {
          javascript: location = "sil.php?id="+id;
      }
  </script>

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
                        <a href="ayarlar.php"><i class="glyphicon glyphicon-cog"></i>  Ayarlar  </a>
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
                        <i class="fa fa-info-circle"></i>  <strong>Yazılar </strong>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="conrainer">
                    <div class="row" style="background:#f1f1f1; padding: 20px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Baslık</th>
                                    <th>Açıklama</th>
                                    <th>Tarih</th>
                                    <th>İşlem</th>

                                </tr>
                            </thead>
                            <tbody>
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

                                        echo '<tr>
                                        <td>'.$baslik.'</td>
                                        <td>'.$aciklama.'</td>
                                        <td>'.$eklemetarihi.'</td>
                                        <td><a class="btn btn-danger" onclick="Idgonder('.$id.');">Sil</a></td>
                                    </tr>';
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
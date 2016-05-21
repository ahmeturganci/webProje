<?php 
require_once("baglan.php");
session_start();
if(!isset($_SESSION['nick'])){
}
else
{
    $nick=$_SESSION['nick'];
}
$yorumSayisi=5;
$sql = 'SELECT COUNT(*) AS topYorum FROM yorum';
$sonuc = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
if ($sonuc){
    $topYorum = $sonuc['topYorum'];
}
$toplamYorum  = ceil($topYorum / $yorumSayisi);
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;
if($id<1) $id=1;
if($id>$toplamYorum ) $id=$toplamYorum ;
$limit=($id-1)*$yorumSayisi;

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
    <script type="text/javascript">
    	function Idgonder(id) {
            alert(id);
            javascript: location = "yorumSil.php?id="+id;
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
                    	<a href="index.php" class="glyphicon glyphicon-home"> Site Görüntüle</a>
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
                        <i class="fa fa-info-circle"></i>  <strong>Yorumlar </strong>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="background:#f1f1f1; padding: 20px;">
                    <div class="conrainer">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mail</th>
                                    <th>Yorum</th>
                                    <th>Tarih</th>
                                    <th>İşlem</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM yorum ORDER BY Id DESC LIMIT ' . $limit . ', ' . $yorumSayisi;
                                $sorgu = $db->query($sql, PDO::FETCH_ASSOC);
                                if (!empty($sorgu) AND $sorgu->rowCount() > 0){
                                    foreach( $sorgu as $sonuc ){
                                       $id=$sonuc['Id'];
                                       $gelenMail=$sonuc['Mail'];
                                       $gelenYorum=$sonuc['Yorum'];
                                       $geleneklemeTarihi=$sonuc['eklemeTarihi'];



                                       echo '<tr>
                                       <td>'.$gelenMail.'</td>
                                       <td>'.$gelenYorum.'</td>
                                       <td>'.$geleneklemeTarihi.'</td>  
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
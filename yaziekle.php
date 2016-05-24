<?php 
require_once("baglan.php");
$sonuc_mesaj="";
if($_POST){
	$baslik=$_POST['baslik'];
	$icerik=$_POST['icerik'];
	$aciklama=$_POST['aciklama'];
	session_start();
	$yazar=$_SESSION['nick'];
	date_default_timezone_set('Europe/Istanbul');
	$eklemeTarihi=date("d-m-Y H:i:s");
	$hata = false;
  $s=0;

   	 if($baslik=="" || $aciklama=="" ||$icerik==""){// bos mu kontrolu
   	 	$hata = true;
   	 	echo "<script>alert('Boş Alan bırakmayınız  !');</script>";
      $s++;
    }
    if ($s>0) {
     header ("refresh:0;url=yonetici.php"); //bu kadar oldu 
     
   }


   if(!$hata)
   {
    $sorgu = $db->prepare("INSERT INTO yazi SET
      Baslik = ?,
      Aciklama = ?,
      Yazar = ?,
      Icerik = ?,
      eklemeTarihi = ?");
    $ekle = $sorgu->execute(array(
     $baslik,$aciklama,$yazar,$icerik,$eklemeTarihi
     ));
    if ($ekle){
      $id = $db->lastInsertId();
      $sonuc_mesaj= "insert işlemi başarılı!";
       header ("Location:yonetici.php"); 
    }
  }
  echo $sonuc_mesaj;
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>


</body >
</html>
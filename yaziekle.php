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

   	 if($baslik==""){// bos mu kontrolu
   	 	$hata = true;
   	 	echo "<script>alert('Baslık boş olamaz !');</script>";
      $s++;
    }

    if ($aciklama=="") {
      $hate=true;
      echo "<script>alert('Açıklama boş olamaz !');</script>";	 	
      $s++;
    }
    if ($icerik=="") {
      $hate=true;
      echo "<script>alert('İçerik boş geçilemez'); </script>";
      $s++;
    }
    if ($s>0) {
      
     header ("refresh:0;url=admin.php"); //bu kadar oldu 
     
   }


   if(!$hata)
   {
    $sql="INSERT INTO yazi(Baslik,Aciklama,Yazar,Icerik,eklemeTarihi) VALUES('$baslik','$aciklama','$yazar','$icerik','$eklemeTarihi')";
    if(!mysqli_query($con,$sql)){
     $sonuc_mesaj=mysqli_error($con);
   }
   else{
    header ("Location:admin.php"); 
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
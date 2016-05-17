<?php 
require_once("baglan.php");
include('session.php');
$sonuc_mesaj="";
if($_POST){
	$baslik=$_POST['baslik'];
	$icerik=$_POST['icerik'];
	$aciklama=$_POST['aciklama'];
	$eklemeTarihi=date("d-m-Y H:i:s");
	
	$sql="INSERT INTO yazi(Baslik,Aciklama,Yazar,Icerik,eklemeTarihi) VALUES('$baslik','$aciklama','$giris_ses','$icerik','$eklemeTarihi')";
	if(!mysqli_query($con,$sql)){
		$sonuc_mesaj=mysqli_error($con);
	}
	else{
		$sonuc_mesaj="yazi eklendi";
		header ("Location:admin.php"); // alert
	}
	echo $sonuc_mesaj;



}


?>
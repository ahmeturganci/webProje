<?php 
require_once("baglan.php");
$id=$_GET['id'];
$sqlYazi ='DELETE FROM yazi WHERE Id='.$id;
$sorguYazi =$db->query($sqlYazi,PDO::FETCH_ASSOC);
$sqlYorum ='DELETE FROM yorum WHERE yaziId='.$id;
$sorguYorum =$db->query($sqlYorum,PDO::FETCH_ASSOC);
if($sqlYazi && $sqlYorum){
	echo "Veri Başarıyla Silindi";  
	 header ("refresh:0;url=yazilar.php");                      
}
else{
	echo "Veri Silinemedi. ";  
} 


?>
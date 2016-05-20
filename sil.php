<?php 
require_once("baglan.php");
$id=$_GET['id'];
$sql ='DELETE FROM yazi WHERE Id='.$id;
$sorgu =$db->query($sql,PDO::FETCH_ASSOC);

if($sql){
	echo "Veri Başarıyla Silindi";  
	 header ("refresh:0;url=yazilar.php");                      
}
else{
	echo "Veri Silinemedi. ";  
} 
?>
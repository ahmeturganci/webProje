<?php 
require_once("baglan.php");
$id=$_GET['id'];
echo  $id;
$sql ='DELETE FROM yorum WHERE Id='.$id;
$sorgu =$db->query($sql,PDO::FETCH_ASSOC);

if($sql){
	//echo "Veri Başarıyla Silindi";  
	 header ("refresh:0;url=yorumlar.php");                      
}
else{
	echo "Veri Silinemedi. ";
	header ("refresh:2;url=yorumlar.php");  
} 


?>
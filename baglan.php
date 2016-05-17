<?php
define('DB_NAME', 'blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (mysqli_connect_errno())
  {
  echo "Bağlanırken hata oluştu : " . mysqli_connect_error();
  }
?>

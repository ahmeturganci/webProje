<?php
try {
$user='root';
$pass='';
$db = new PDO('mysql:host=localhost;dbname=blog;', $user, $pass);
$db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
}
?>
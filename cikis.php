<?php
session_start();
unset($_SESSION['nick']);
if(session_destroy())
{
header("Location: index.php");
}
?>
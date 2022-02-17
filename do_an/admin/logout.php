
<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["access"]);
setcookie('remember',null,-1);
header("location:login.php");
?>
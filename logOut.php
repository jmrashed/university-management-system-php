<?php
session_start(); 
unset($_SESSION['LOGIN_ID']);
unset($_SESSION['LOGIN_NAME']);
unset($_SESSION['LOGIN_EMAIL']);
unset($_SESSION['LOGIN_TYPE']);
session_destroy();
header("Location: login.php");
exit;
?>

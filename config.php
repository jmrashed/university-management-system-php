<?php

session_start();
if (isset($_SESSION['LOGIN_NAME'])) {
    $LOGIN_ID = $_SESSION['LOGIN_ID'];
    $LOGIN_NAME = $_SESSION['LOGIN_NAME'];
    $LOGIN_EMAIL = $_SESSION['LOGIN_EMAIL'];
    $LOGIN_TYPE = $_SESSION['LOGIN_TYPE'];
    if ($LOGIN_TYPE == "teacher") {
        $LOGIN_SUBJECT = $_SESSION['LOGIN_SUBJECT'];
    }
} else {

    header("Location:login.php");
}
?>
<?php
session_start();
//print_r($_SESSION);
$notaccess='<h1 style="color:red">Access Denied ! Please login as Admin or Teacher. Login <a href="../logOut.php">here</a></h1>';
if (isset($_SESSION['LOGIN_NAME'])) {
    $LOGIN_ID = $_SESSION['LOGIN_ID'];
    $LOGIN_NAME = $_SESSION['LOGIN_NAME'];
    $LOGIN_EMAIL = $_SESSION['LOGIN_EMAIL'];
    $LOGIN_TYPE = $_SESSION['LOGIN_TYPE'];
    if ($LOGIN_TYPE == "teacher") {
       $LOGIN_SUBJECT = $_SESSION['LOGIN_SUBJECT'];
        
    } 
} else {

    header("Location:../../login.php");
}
require '../database.php';
include '../../connection.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Administrative Login - Online Exam</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../quiz.css" rel="stylesheet" type="text/css">
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            <!--
            body {
                margin-left: 0px;
                margin-top: 0px;
            }
            -->
        </style>
    </head>

    <body>
        <div class="container">



            <table border="0" width="100%" cellspacing="0" cellpadding="0" background="../image/topbkg.jpg">
                <tr>
                    <td width="90%" valign="top">
                        <!--You can modify the text, color, size, number of loops and more on the flash header by editing the text file (fence.txt) included in the zip file.-->
                        <div align="left"><object classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000
                                                  codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,2,0
                                                  width=500
                                                  height=68>
                                <param name=movie value=../image/fence.swf>
                                <param name=quality value=high>
                                <param name=BGCOLOR value=#000000>
                                <param name=SCALE value=showall>
                                <param name=wmode value=transparent> 
                                <embed src=../image/fence.swf
                                       quality=high
                                       pluginspage=http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash type=application/x-shockwave-flash
                                       width=500
                                       height=68
                                       bgcolor=#000000
                                       scale= showall>
                                </embed>
                            </object></div></td>
                    <td width="10%">
                        <img border="0" src="../image/topright.jpg" width="203" height="68" align="right"></td>
                </tr>
            </table>
            <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="../image/blackbar.jpg">
                <tr>
                    <td width="100%"><img border="0" src="../image/blackbar.jpg" width="89" height="15"></td>
                </tr>
            </table>

            <div class="container"> 

                <?php if (isset($_SESSION['LOGIN_ID'])) { ?>

                    <ul class="nav nav-pills">
                        <li><a class=" " href="testadd.php">Add Test</a> </li>
                        <li><a class=" "  href="questionadd.php">Add Question </a> </li> 
                         
                        <li><a href="../../adminhome.php" class="text-uppercase" > Welcome to <?= $LOGIN_NAME; ?> Panel : <?= $LOGIN_TYPE; ?></a></li>
                            <li> <a  class=" "  href="signout.php">Signout</a></li> 
                         
                    </ul>

                <?php }
                ?>
                      

<?php
//include("config.php");
session_start();
if (isset($_SESSION['LOGIN_NAME'])) {
    $LOGIN_ID = $_SESSION['LOGIN_ID'];
    $LOGIN_NAME = $_SESSION['LOGIN_NAME'];
    $LOGIN_EMAIL = $_SESSION['LOGIN_EMAIL'];
    $LOGIN_TYPE = $_SESSION['LOGIN_TYPE'];
    if ($LOGIN_TYPE == "teacher") {
        $LOGIN_SUBJECT = $_SESSION['LOGIN_SUBJECT'];
    }
}

include("connection.php");
include("function.php");

if (isset($_POST['submit'])) {


    // session_start();
    unset($_SESSION['LOGIN_ID']);
    unset($_SESSION['LOGIN_NAME']);
    unset($_SESSION['LOGIN_EMAIL']);

//Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $conn;
        $str = @trim($str);
        if (get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }

        return mysqli_real_escape_string($conn, $str);
    }

//Sanitize the POST values
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $table = clean($_POST['table']);

    $sql = "SELECT * FROM $table WHERE email='$email' AND password='$password'";
    // echo $sql;
    $result = $conn->query($sql);
//Check whether the query was successful or not
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            //Login Successful
            session_regenerate_id();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['LOGIN_ID'] = $row['id'];
            $_SESSION['LOGIN_NAME'] = $row['name'];
            $_SESSION['LOGIN_EMAIL'] = $row['email'];
            $_SESSION['LOGIN_TYPE'] = $table;
            if ($table == "teacher") {
                $_SESSION['LOGIN_SUBJECT'] = $row['subject'];
            }
            session_write_close();
            header("location: adminhome.php");
            // exit();
            //print_r($_SESSION);
        } else {
            //Login failed
            $errmsg = 'Email or password is invalid';
            header("location: home.php?tab=home&errmsg=$errmsg");
        }
    } else {
        die("Query failed");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">        
        <link rel="stylesheet" href="bootstrap/css/mystyle.css">
        <link href="bootstrap/css/half-slider.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue layout-top-nav">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="home.php?tab=home" class="navbar-brand"><img src="images/logo.png" class="img img-responsive" width="100px" height="30px">

                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="home.php?tab=home">Home</a></li>  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="home.php?tab=introduction">Introduction</a></li>
                                    <li><a href="home.php?tab=history">History</a></li>
                                    <li><a href="home.php?tab=achievements"> Achievements </a></li> 
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informations<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="home.php?tab=services">Our Services</a></li> 
                                    <li class=""><a href="home.php?tab=adminssions">Admissions</a></li>  
                                    <li><a href="home.php?tab=facilities"> Facilities </a></li> 
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academic<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="onlineexam/index.php">Online Exam</a></li> 
                                    <li class=""><a href="getResult.php">Result</a></li> 

                                </ul>
                            </li>

                            <li class=""><a href="home.php?tab=contact">Contact Us</a></li> 

                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->

                    <div class="navbar-custom-menu"> 
                        <?php
                        if (isset($LOGIN_ID)) {
                            echo '<ul class="nav nav-pills">'
                            . '<li><a href="adminhome.php" class="text-uppercase">Wlecome to ' . $LOGIN_TYPE . ' PANEL</a></li>'
                            . '<li><a href="logOut.php">Logout</a></li>'
                            . '</ul>';
                        } else {
                            ?>
                            <form class="navbar-form navbar-left" role="search" action="userheader.php" method="post">
                                <div class="form-group">
                                    <select name="table" class="form-control"> 
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="navbar-search-input" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="navbar-search-input" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Login" class="form-control btn btn-primary" >
                                </div>
                            </form>
                        <?php } ?>
                    </div>

                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column --> 
        <div class="container">  
            <?php if (isset($_GET['errmsg'])) { ?>
                <div class="alert alert-danger" id="myAlert">
                    <a href="#" class="close">&times;</a>
                    <strong>Sorry!</strong> Your User or Password invalid!
                </div>
            <?php } ?>
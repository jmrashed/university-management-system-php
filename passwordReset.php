<?php
include('connection.php');
include('function.php');


if (isset($_POST['reset'])) {

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
    $phone = clean($_POST['phone']);
    $table = clean($_POST['table']);

    $sql = "SELECT * FROM $table WHERE email='$email' AND phone='$phone'";
    //echo $sql;
    $result = $conn->query($sql);
//Check whether the query was successful or not
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            //$password = 10000 + rand() % 10000;

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < 8; $i++) {
                $password = $password . $characters[rand(0, strlen($characters))];
            }

            $sql = "UPDATE $table SET password = '$password' WHERE email='$email'";
            $result = $conn->query($sql);
            if ($result) {
                $message = "Your password has been changed. <br>You password is <span class='label label-danger'>" . $password."</span>";
            }
        } else {
            //Login failed
            $errmsg = 'Email or phone is invalid';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Famous Academic Coaching, Jhenaidah | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> 
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><?php echo get_SystemName(); ?> </a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="label-info text-center">Fill up the correct email and phone number to reset password</p>

                <?php
                if (isset($message)) {

                    echo '<div class="row text-center"><span style="color:green"><b>' . $message . ' </b></span></div>';
                }
                ?>
                <form action="passwordReset.php" method="post" >
                    <div class="form-group">
                        <select name="table" class="form-control">
                            <option value="admin"> Admin</option>
                            <option value="teacher"> Teacher</option>
                            <option value="student"> Student</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required"> 
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" class="form-control" placeholder="Phone Number" required="required"> 
                    </div>
                    <div class="row">

                        <div class=" col-md-offset-8 col-xs-4"> 
                            <input type="submit" class="btn btn-danger ng-binding" value="Reset" name="reset" >
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                Please <a href="login.php">Sign in</a> here. Or 
                <a href="register.html" class="text-center">Register</a>

            </div>
            <!-- /.login-box-body -->
        </div> 
    </body>
</html>

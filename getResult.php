<?php
include('connection.php');
include('function.php');


if (isset($_POST['submit'])) {

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
    $exam = clean($_POST['exam']);

    $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
    //echo $sql;
    $result = $conn->query($sql);
//Check whether the query was successful or not
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
              $row = $result->fetch_assoc();
                $sid = $row['id'];
                
            $sql = "SELECT $exam FROM result where sid=$sid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $mark = $row[$exam];
                $message = $exam." : ".$mark;
            } 
        }else {
                //Login failed
                $message = 'Email or password is invalid';
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

                <?php
                if (isset($message)) {

                    echo '<div class="row text-center"><h1 style="color:green"><b>' . $message . ' </b></h1></div>';
                }
                ?>
                <form action="getResult.php" method="post" >
                    <div class="form-group"> 

                        <select class="form-control" name="exam" >  
                            <?php
                            $sql = "SELECT * FROM exam ORDER BY examname";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    ?>

                                    <option value="<?= $row['examname']; ?>"  class=" ng-scope"><?= $row['examname']; ?></option>
                                    <?php
                                }
                            }
                            ?> 

                        </select>


                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required"> 
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required="required"> 
                    </div>
                    <div class="row">

                        <div class="col-xs-12"> 
                            <a class="btn btn-primary" href="index.php"> Back</a>
                            <input type="submit" class="btn btn-success ng-binding" value="Show Mark" name="submit" >
                        
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-box-body -->
        </div> 
    </body>
</html>

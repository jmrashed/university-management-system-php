<?php

include("connection.php");


if (isset($POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    /*
      session_start();
      unset($_SESSION['LOGIN_ID']);
      unset($_SESSION['LOGIN_NAME']);
      unset($_SESSION['LOGIN_EMAIL']);


      //Array to store validation errors
      $errmsg_arr = array();

      //Validation error flag
      $errflag = false;

      //Function to sanitize values received from the form. Prevents SQL injection
      function clean($str) {
      $str = @trim($str);
      if (get_magic_quotes_gpc()) {
      $str = stripslashes($str);
      }
      return mysql_real_escape_string($str);
      }

      //Sanitize the POST values
      $email = clean($_POST['email']);
      $password = clean($_POST['password']);
      $table = clean($_POST['table']);

      //Input Validations
      if ($email == '') {
      $errmsg_arr[] = 'Email missing';
      $errflag = true;
      }
      if ($password == '') {
      $errmsg_arr[] = 'Password missing';
      $errflag = true;
      }

      //If there are input validations, redirect back to the login form
      if ($errflag) {
      $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
      session_write_close();
      header("location: index.php");
      exit();
      }

      //Create query
      $sql = "SELECT * FROM '$table' WHERE email='$email' AND password='$password'";

      $result = $conn->query($sql);
      //Check whether the query was successful or not
      if ($result) {
      if (mysql_num_rows($result) > 0) {
      //Login Successful
      session_regenerate_id();
      $row = mysql_fetch_assoc($result);
      $_SESSION['LOGIN_ID'] = $row['id'];
      $_SESSION['LOGIN_NAME'] = $row['name'];
      $_SESSION['LOGIN_EMAIL'] = $row['email'];
      $_SESSION['LOGIN_TYPE'] = $table;
      session_write_close();
      header("location: home.php");
      exit();
      } else {
      //Login failed
      $errmsg_arr[] = 'user name and password not found';
      $errflag = true;
      if ($errflag) {
      $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
      session_write_close();
      header("location: index.php");
      exit();
      }
      }
      } else {
      die("Query failed");
      }

     * 
     */
}
?>
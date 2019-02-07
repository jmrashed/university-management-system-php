<?php
session_start();
error_reporting(1);
 
  $cn = mysql_connect('localhost','coderspy_xy','bkUv1&Thrp4e');
  mysql_select_db('coderspy_xy',$cn );
  
  
include("database.php");
include("../connection.php");
include("../function.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/* $rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
  if($_SESSION[qn]>mysql_num_rows($rs))
  {
  unset($_SESSION[qn]);
  exit;
  } */
if (isset($subid) && isset($testid)) {
    $_SESSION[sid] = $subid;
    $_SESSION[tid] = $testid;
    header("location:quiz.php");
}
if (!isset($_SESSION[sid]) || !isset($_SESSION[tid])) {
    header("location: index.php");
}
?>
 
        <?php
        include("header.php");


        $query = "select * from mst_question";

        $rs = mysql_query("select * from mst_question where test_id=$tid", $cn) or die(mysql_error());
        if (!isset($_SESSION[qn])) {
            $_SESSION[qn] = 0;
            mysql_query("delete from mst_useranswer where sess_id='" . session_id() . "'") or die(mysql_error());
            $_SESSION[trueans] = 0;
        } else {
            if ($submit == 'Next Question' && isset($ans)) {
                mysql_data_seek($rs, $_SESSION[qn]);
                $row = mysql_fetch_row($rs);
                mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
                if ($ans == $row[7]) {
                    $_SESSION[trueans] = $_SESSION[trueans] + 1;
                }
                $_SESSION[qn] = $_SESSION[qn] + 1;
            } else if ($submit == 'Get Result' && isset($ans)) {
                mysql_data_seek($rs, $_SESSION[qn]);
                $row = mysql_fetch_row($rs);
                mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
                if ($ans == $row[7]) {
                    $_SESSION[trueans] = $_SESSION[trueans] + 1;
                }
                echo "<h1 class=head1> Result</h1>";
                $_SESSION[qn] = $_SESSION[qn] + 1;
                echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
                echo "<tr class=tans><td>True Answer<td>" . $_SESSION[trueans];
                $w = $_SESSION[qn] - $_SESSION[trueans];
                echo "<tr class=fans><td>Wrong Answer<td> " . $w;
                echo "</table>";
                mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'" . date("d/m/Y") . "',$_SESSION[trueans])") or die(mysql_error());
                $score = $_SESSION[trueans];

                $sql = "Select * from mst_test where test_id='$tid'";
              //  echo $sql;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $testname = $row['test_name'];
                $sub = $row['sub'];

                  $sql = "UPDATE result SET $testname='$_SESSION[trueans]'  where sid='$LOGIN_ID' and sub='$sub' ";
                if ($conn->query($sql) === TRUE) {

                    $Message = $Message . "Update has been Saved";
                } else {
                    $Message = $Message . "Error: " . $sql . "<br>" . $conn->error;
                }

                echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
                unset($_SESSION[qn]);
                unset($_SESSION[sid]);
                unset($_SESSION[tid]);
                unset($_SESSION[trueans]);
                exit;
            }
        }
        $rs = mysql_query("select * from mst_question where test_id=$tid", $cn) or die(mysql_error());
        if ($_SESSION[qn] > mysql_num_rows($rs) - 1) {
            unset($_SESSION[qn]);
            echo "<h1 class=head1>Some Error  Occured</h1>";
            session_destroy();
            echo "Please <a href=index.php> Start Again</a>";

            exit;
        }
        mysql_data_seek($rs, $_SESSION[qn]);
        $row = mysql_fetch_row($rs);
        echo "<form name=myfm method=post action=quiz.php>";
        echo "<table class='table table-responsive' style='font-size:16pt;'> ";
        $n = $_SESSION[qn] + 1;
        echo "<tR><td><span class=style2>Que " . $n . ": $row[2]</style>";
        echo "<tr><td><input type=radio name=ans value=1>$row[3]";
        echo "<tr><td> <input type=radio name=ans value=2>$row[4]";
        echo "<tr><td><input type=radio name=ans value=3>$row[5]";
        echo "<tr><td><input type=radio name=ans value=4>$row[6]";

        if ($_SESSION[qn] < mysql_num_rows($rs) - 1)
            echo "<tr><td><input type=submit name=submit class='btn btn-primary' value='Next Question'></form>";
        else
            echo "<tr><td><input type=submit name=submit  class='btn btn-primary' value='Get Result'></form>";
        echo "</table></table>";
        ?>
    </body>
</html>
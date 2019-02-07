<?php
include("header.php");
include("database.php");
$sid = $_SESSION['LOGIN_ID'];



echo "<h2 class=head1> Select Subject to Give Quiz </h2>";

$sql = "select * from student where id='$LOGIN_ID'";
//echo $sql;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$class = $row['class'];

$sql2 = "select * from subject where classname='$class' ";
//echo $sql2;
$result = $conn->query($sql2);
echo "<table align=center class='table table-responsive'>";
while ($row2 = $result->fetch_assoc()) {
   /* echo '<pre>';
    print_r($row2);
    echo '</pre>';
    * 
    */
    ?>
    <tr><td><a href=showtest.php?subid=<?= $row2['id']; ?>><font size=4>  <?= $row2['subjectname']; ?></font></a> 
            <?php
        }
        echo "</table>";
        ?> 
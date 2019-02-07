<?php
include("header.php");
include("database.php");
extract($_GET);

$sql = "select * from subject where id='$subid'"; 
//echo $sql;
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 
$sub=$row['subjectname'];
echo "<h3 align=center><font color=blue> Subject : ".$sub." </font></h3>"; 

echo "<h4 class=head1> Select Quiz Name to Give Quiz </h4>";
echo "<table align=center class='table table-bordered'>";

$sql = "select * from mst_test where sub='$sub'";
//echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        
        $test_name=$row['test_name'];        
         
        $sql1 = "select * from result where sid='$LOGIN_ID' and sub='$sub'";
        $result1 = $conn->query($sql1);
        $row2 = $result1->fetch_assoc();
         $test=$row2[$test_name];
        if($test==-1){
        ?>
        <tr><td align=center ><a href=quiz.php?testid=<?= $row['test_id']; ?>&subid=<?= $subid; ?>> Online Test : <font size=4><?= $row['test_name']; ?></font></a></td></tr>

        <?php
    }
    }
    echo "</table>";
}
 else {
    echo "<br><br><h2 class=head1> No Quiz for this Subject </h2>";
} 
?>
</body>
</html>

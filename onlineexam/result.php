<?php
include("header.php");
include("database.php");
?>
 

<?php
extract($_SESSION);
$sql = "select * from result where sid='$LOGIN_ID'";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <h1 class=head1>Online Test Result </h1>
    <table class="table table-responsive table-bordered">
        <tr>
            <th>Subject Name </th>
            <th>CT1 </th>
            <th>CT2 </th>
            <th>CT3 </th>
            <th>CT4 </th> 

        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['sub']; ?> </td>
                <td> 
                    <?php
                    if ($row['ct1'] == -1)
                        echo 'Not take exam';
                    else
                        echo $row['ct1'];
                    ?> 
                </td>
                <td> 
                    <?php
                    if ($row['ct2'] == -1)
                        echo 'Not take exam';
                    else
                        echo $row['ct2'];
                    ?> 
                </td>
                <td> 
                    <?php
                    if ($row['ct3'] == -1)
                        echo 'Not take exam';
                    else
                        echo $row['ct3'];
                    ?> 
                </td>
                <td> 
                    <?php
                    if ($row['ct4'] == -1)
                        echo 'Not take exam';
                    else
                        echo $row['ct4'];
                    ?> 
                </td>

            </tr> 
            <?php
        }

        echo "</table>";
    }
    ?>
</body>
</html>

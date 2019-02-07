<?php
include("connection.php");
$Message = "";
$subjectName = "";



if (isset($_GET['deletesubject'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM subject WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:subjects.php?Message= A subject has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit'])) {
    $subjectName = $_POST['subjectName'];
    $className = $_POST['className'];
    $sql = "INSERT INTO subject (classname, subjectname) VALUES ('$className','$subjectName')";
    if ($conn->query($sql) === TRUE) {

        header('Location:subjects.php?Message= A new subject has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['update'])) {
    $subjectName = $_POST['subjectName'];
    $className = $_POST['className'];
    $id = $_POST['id'];
    $sql = "UPDATE subject SET classname='$className', subjectname = '$subjectName' WHERE  id= $id";
    if ($conn->query($sql) === TRUE) {

        header('Location:subjects.php?Message= A subject has been Updated. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




include("header.php");
include("leftsidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subjects
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Subjects</li>
        </ol>
    </section>
    <section class="content">
        <div class="box col-xs-12">
            <div class="box-header">

                <?php
                $sql = "SELECT * FROM student where id=$LOGIN_ID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    $count = 0;
                    $row = $result->fetch_assoc();
                    $department = $row['department'];
                    $trimester = $row['trimester'];
                    $batch = $row['class']; 
                    $father = $row['father']; 
                    $studentid= $row['studentid']; 
                      $name= $row['name'];
                   
                }
                ?>
                <div class="row">
                    <h4 align="center" style="font-size: 20pt"><?php echo get_SystemName(); ?></h4> 
                </div>
                <table class="table table-responsive">
                    <tr>
                        <th>Name</th><td><?=$name;?></td> <th>Department</th><td><?=$department;?></td>
                    </tr>
                    <tr>
                        <th>Father Name</th><td><?=$father;?></td> <th>Trimester</th><td><?=$trimester;?></td>
                    </tr>
                    <tr>
                        <th>Student ID</th><td><?=$studentid;?></td> <th>Batch</th><td><?=$batch;?></td>
                    </tr> 
                    
                    
                </table>


                <h3 class="box-title ng-binding">List subjects</h3>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody><tr> 
                            <th class="ng-binding">SI. No</th> 
                            <th class="ng-binding">Course Code </th> 
                            <th class="ng-binding">Course Name</th>   
                        </tr>
                        <?php
                        $sql = "SELECT * FROM subject where classname='$batch'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {
                                $count = $count + 1;
                                ?>


                                <tr  >
                                    <td class="ng-binding"><?= $count; ?></td>

                                    <td class="ng-binding"><?= $row["coursecode"]; ?></td>  
                                    <td class="ng-binding"><?= $row["subjectname"]; ?></td>  
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Subject</td></tr>';
                        }
                        ?>


                    </tbody></table>
                <dir-pagination-controls class="pull-right ng-isolate-scope" on-page-change="pageChanged(newPageNumber)" template-url="templates/dirPagination.html"><!-- ngIf: 1 < pages.length --></dir-pagination-controls>
            </div>
        </div>



    </section> 

</div>





<?php
include("footer.php");
?>
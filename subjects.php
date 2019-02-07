<?php
include("connection.php");
$Message = "";
$subjectName="";
$courseCode="";


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
    $courseCode=$_POST['courseCode'];
    $subjectName = $_POST['subjectName'];
    $className = $_POST['className'];
    $sql = "INSERT INTO subject (classname, subjectname,coursecode) VALUES ('$className','$subjectName','$courseCode')";
    if ($conn->query($sql) === TRUE) {

        header('Location:subjects.php?Message= A new subject has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['update'])) {
    $courseCode=$_POST['courseCode'];
    $subjectName = $_POST['subjectName'];
    $className = $_POST['className'];
    $id = $_POST['id'];
    $sql ="UPDATE subject SET classname='$className', subjectname = '$subjectName', coursecode='$courseCode' WHERE  id= $id";
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
            Courses
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Courses</li>
        </ol>
    </section>


    <?php if (isset($_GET['addsubject']) || isset($_GET['editsubject'])) { ?>

        <?php
        if (isset($_GET['editsubject'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM subject where id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $subjectName = $row['subjectname'];
                    $courseCode  = $row['coursecode'];
                }
            }
        }
        ?> 

        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="box-title ng-binding">Add Course</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal " method="post" action="subjects.php" >
                          <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="className" > 
                                <?php
                                $sql = "SELECT * FROM class ORDER BY classname";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option value="<?= $row['classname']; ?>"   class="ng-binding ng-scope"><?= $row['classname']; ?></option>
                                        <?php
                                    }
                                }
                                ?> 

                            </select>
                        </div>
                    </div>
                        
                        <div class="form-group has-error" >
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Course Name * </label>
                            <div class="col-sm-10">
                                <input type="text" name="subjectName"   
                                       class="form-control ng-pristine ng-invalid ng-invalid-required" required=""
                                       placeholder="Course Name" value="<?= $subjectName; ?>">
                                <input type="hidden" value="<?= $id; ?>" name="id">
                            </div>
                        </div> 
                        
                           <div class="form-group has-error" >
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Course Code * </label>
                            <div class="col-sm-10">
                                <input type="text" name="courseCode"   
                                       class="form-control ng-pristine ng-invalid ng-invalid-required" required=""
                                       placeholder="Ex. CSE-121" value="<?= $courseCode; ?>"> 
                            </div>
                        </div> 

                        

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10"> 
                                <?php if (isset($_GET['editsubject'])) { ?>
                                    <input type="submit" class="btn btn-primary ng-binding" value="Update subject" name="update" >
                                <?php } else { ?>
                                    <input type="submit" class="btn btn-primary ng-binding" value="Add subject" name="submit" >
    <?php } ?>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
<?php } ?>




    <section class="content">
<?php if (isset($_GET['Message'])) {
    ?>
            <div class="col-md-12 pull-right"><div class="alert alert-success">
                    <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
<?php } ?> 

        <a href="subjects.php?addsubject=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add subject</a>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ng-binding">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="teachers/export" class="ng-binding">Export to Excel</a></li>
                <li><a href="teachers/exportpdf" target="_BLANK" class="ng-binding">Export to PDF</a></li>
            </ul>
        </div>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ng-binding">Import</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ng-binding">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a ng-click="import('excel')" class="ng-binding">Import from Excel</a></li>
            </ul>
        </div>
        <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title ng-binding">List subjects</h3>
                
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Class</th> 
                            <th class="ng-binding">Course Code</th> 
                            <th class="ng-binding">Course </th>  
                            <th class="no-print ng-binding">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM subject order by classname";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            $count=0;
                            while ($row = $result->fetch_assoc()) {
                                $count=$count+1;
                                ?>


                                <tr  >
                                    <td class="ng-binding"><?=$count; ?></td>

                                    <td class="ng-binding"><?= $row["classname"]; ?></td> 
                                    <td class="ng-binding"><?= $row["coursecode"]; ?></td> 
                                    <td class="ng-binding"><?= $row["subjectname"]; ?></td> 
                                    <td class="no-print">
                                        <a  href="subjects.php?id=<?= $row["id"]; ?>&editsubject=yes" class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a    href="subjects.php?id=<?= $row["id"]; ?>&deletesubject=yes"" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Course</td></tr>';
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
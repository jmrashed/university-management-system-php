<?php
include("connection.php");
$Message = "";
$id = "";
$name = "";
$degree = "";
$designation = "";
$subjectid = "";
$email = "";
$phone = "";
$joindate = "";
$designation = "";
$address = "";
$subjectid = "";
$gender = "";


if (isset($_GET['deleteresult'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM result WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:results.php?Message= A result has been Deleted. ');
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
            Result
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Results</li>
        </ol>
    </section> 
    <?php
    if (isset($_POST['submit'])) {
        $exam = $_POST['exam'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $sql = "SELECT * FROM student Where class='$class'";
        // echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            ?>
            <section class="content">
                <div class="box col-xs-12">
                    <div class="row text-center">
                        <h2 class="coachinname">XY University</h2>
                        <span class="coachinaddress">51 Shiddheswari Rd, Dhaka 1217</span>
                        <h3 class="coachinmark">MARK ENTRY FORM</h3>
                        <div class="col-md-4"> <span class="coachinclass"> Exam: <?= $exam; ?> </span></div>
                        <div class="col-md-4"> <span class="coachinclass"> Class: <?= $class; ?> </span></div>
                        <div class="col-md-4"> <span class="coachinclass"> Subject: <?= $subject; ?> </span> </div>
                    </div>

                    <div class="box-body  col-md-offset-2 col-md-8">
                        <form action="savemark.php" method="post" class=" form-horizontal">
                            <input type="hidden" name="class" value="<?= $class; ?>"> 
                            <input type="hidden" name="subject" value="<?= $subject; ?>"> 
                            <input type="hidden" name="exam" value="<?= $exam; ?>">  

                            <table class="table table-bordered table-striped"> 
                                <tr> <td>Si No.</td><td> Name</td> <td> Mark</td></tr>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    $count++;
                                    ?>
                                    <tr> <td><?= $row['id']; ?></td><td> <?= $row['name']; ?></td> <td> 
                                            <input type="hidden" name="id<?= $count; ?>" value="<?= $row['id']; ?>">
                                            <input type="number" class="form-control form-horizontal" name="mark<?= $count; ?>">

                                        </td></tr> 


                                    <?php
                                }
                                ?>
                                <tr> <td colspan="3"> 

                                        <input type="hidden" name="count" value="<?= $count; ?>">  
                                        <input  type="submit" class="pull-right btn btn-lg btn-primary" name="savemark" value="Save" >
                                    </td></tr>
                            </table>
                        </form>
                    </div>
                </div>
            </section>

            <?php
        }
    }
    ?>

    <section class="content">
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title ng-binding">Add result</h3>
            </div>
            <div class="box-body ">
                <form class="form-horizontal" method="post" action="results.php" >


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="class" > 
                                <?php
                                $sql = "SELECT * FROM class ORDER BY classname";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $row['classname']; ?>" class="ng-binding ng-scope"><?= $row['classname']; ?></option>
                                        <?php
                                    }
                                }
                                ?> 

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="subject" > 
                                <?php
                                $sql = "SELECT * FROM subject ORDER BY subjectname";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option value="<?= $row['subjectname']; ?>"  class="ng-binding ng-scope"><?= $row['subjectname']; ?></option>
                                        <?php
                                    }
                                }
                                ?> 

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="exam" > 
                                <?php
                                $sql = "SELECT * FROM exam ORDER BY examname";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option value="<?= $row['examname']; ?>" <?php if ($sujectid = $row['id']) echo 'selected'; ?> class="ng-binding ng-scope"><?= $row['examname']; ?></option>
                                        <?php
                                    }
                                }
                                ?> 

                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                            <?php if (isset($_GET['editresult'])) { ?>

                                <input type="submit" name="update"  class="btn btn-primary ng-binding" value="Update Result">
                            <?php } else { ?>
                                <input type="submit" name="submit"  class="btn btn-primary ng-binding" value="Add Result">

                                <input  type="submit" class="pull-right btn btn-success" name="viewmark" value="View Result" >
                            <?php } ?>

                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>


    <?php
    if (isset($_POST['viewmark'])) {
        $exam = $_POST['exam'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        ?>
        <section class="content ng-scope">
            <?php if (isset($_GET['Message'])) {
                ?>
                <div class="col-md-12 pull-right"><div class="alert alert-success">
                        <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
            <?php } ?> 

            <a href=" results.php?addresult=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add result</a>
            <div class="btn-group pull-right no-print">
                <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
                <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only ng-binding">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="results/export" class="ng-binding">Export to Excel</a></li>
                    <li><a href="results/exportpdf" target="_BLANK" class="ng-binding">Export to PDF</a></li>
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
                <div class="row text-center">
                    <h2 class="coachinname">XY University</h2>
                    <span class="coachinaddress">51 Shiddheswari Rd, Dhaka 1217</span>
                    <h3 class="coachinmark">MARK SHEET</h3>
                    <div class="col-md-4"> <span class="coachinclass"> Exam: <?= $exam; ?> </span></div>
                    <div class="col-md-4"> <span class="coachinclass"> Class: <?= $class; ?> </span></div>
                    <div class="col-md-4"> <span class="coachinclass"> Subject: <?= $subject; ?> </span> </div>
                </div>
                <div class="box-body table-responsive">

                    <?php
                    $sql = "SELECT * FROM student s, mark m where s.id=m.studentid and m.subject='$subject' and m.class='$class'";
                    //  echo $sql;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        $count = 0;
                        
                        ?>
                        <table class="table table-bordered table-striped">
                            <tr> 
                                    <th class="ng-binding">ID</th> 
                                    <th class="ng-binding">Full name</th> 
                                    <th class="ng-binding">Class</th>
                                    <th class="ng-binding">Subject</th>
                                    <th class="ng-binding">Mark</th> 
                                  <!--  <th class="ng-binding">Grade Point</th> -->
                                    <th class="no-print ng-binding">Operations</th>
                                </tr>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    $count++;
                                   // $mark=$row["mark"];
                                   // $gradePoint= get_gradePoint($row["mark"]);
                                  //  echo $row["mark"].'---->'.$gradePoint.'<br>';
                                    ?>


                                    <tr>

                                        <td class="ng-binding"><?= $count; ?></td> 
                                        <td class="ng-binding"><?= $row["name"]; ?></td> 
                                        <td class="ng-binding"><?= $row["class"]; ?></td>
                                        <td class="ng-binding"><?= $row["subject"]; ?></td>
                                        <td class="ng-binding"><?= $row["mark"]; ?></td>   
                                        <td class="no-print">
                                            <a  href="results.php?id=<?= $id; ?>&editresult=yes"  class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="results.php?id=<?= $id; ?>&deleteresult=yes" type="button" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                echo '</table>';
                            } else {
                                echo ' <hr><span class="label label-danger btn-lg">No Results</span> ';
                            }
                            ?>

                       
                </div>
            </div>
        </section>
    <?php } ?>

</div>




<?php
include("footer.php");
?>
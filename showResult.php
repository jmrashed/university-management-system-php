<?php
include("connection.php");
$Message = "";
$className = "";

$studentID = 2;

function maxCT($a, $b) {
    if ($a > $b)
        return $a;
    else
        return $b;
}

function get_gradePoint($m) {
    if ($m >= 40 && $m <= 49) {
        $f = 2.00;
    } elseif ($m >= 50 && $m <= 54) {
        $f = 2.50;
    } elseif ($m >= 55 && $m <= 59) {
        $f = 2.75;
    } elseif ($m >= 60 && $m <= 64) {
        $f = 3.00;
    } elseif ($m >= 65 && $m <= 69) {
        $f = 3.25;
    } elseif ($m >= 70 && $m <= 74) {
        $f = 3.50;
    } elseif ($m >= 75 && $m <= 79) {
        $f = 3.75;
    } elseif ($m >= 80 && $m <= 100) {
        $f = 4.00;
    } else {
        $f = 0;
    }
    return $f;
}

if (isset($_POST['updatemark'])) {
    /* echo '<pre>';
      print_r($_POST);
      echo '</pre>';

     * 
     */
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $studentid = $_POST['studentid'];
    $ct1 = $_POST['ct1'];
    $ct2 = $_POST['ct2'];
    $ct3 = $_POST['ct3'];
    $ct4 = $_POST['ct4'];
    $ass1 = $_POST['ass1'];
    $ass2 = $_POST['ass2'];
    $mid = $_POST['mid'];
    $final = $_POST['final'];
    $att = $_POST['att'];
    $total = maxCT($ct1, $ct2) + maxCT($ct3, $ct4) + maxCT($ass1, $ass2) + $mid + $final + $att;
    $cgpa = get_gradePoint($total);
    $sql = "UPDATE result SET  ct1='$ct1', ct2='$ct2', ct3='$ct3', ct4='$ct4', mid='$mid', final='$final', ass1='$ass1', "
            . "ass2='$ass2', attendance='$att',total='$total',cgpa='$cgpa' where sid=$studentid and sub='$subject' ";

    // echo $sql;
    if ($conn->query($sql) === TRUE) {

        $Message = "Mark has been Saved";
    } else {
        $Message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (isset($_POST['saveresult'])) {

    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $studentid = $_POST['studentid'];
    $ct1 = $_POST['ct1'];
    $ct2 = $_POST['ct2'];
    $ct3 = $_POST['ct3'];
    $ct4 = $_POST['ct4'];
    $ass1 = $_POST['ass1'];
    $ass2 = $_POST['ass2'];
    $mid = $_POST['mid'];
    $final = $_POST['final'];
    $att = $_POST['att'];
    $total = maxCT($ct1, $ct2) + maxCT($ct3, $ct4) + maxCT($ass1, $ass2) + $mid + $final + $att;
    $cgpa = get_gradePoint($total);
    //   echo 'CGPA--->>' . $cgpa;
    $sql = "INSERT INTO result(sid, sub, ct1, ct2, ct3, ct4, mid, final, ass1, ass2, attendance,total,cgpa, datetime) "
            . "VALUES ('$studentid','$subject','$ct1','$ct2','$ct3','$ct4','$mid','$final','$ass1','$ass2','$att','$total','$cgpa', now() )";
    if ($conn->query($sql) === TRUE) {

        $Message = "Mark has been Saved";
    } else {
        $Message = "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_GET['deletemark'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM result WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:showResult.php?Message= A mark has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit'])) {
    $className = $_POST['className'];
    $sql = "INSERT INTO class (classname) VALUES ('$className')";
    if ($conn->query($sql) === TRUE) {

        header('Location:showResult.php?Message= A new class has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['update'])) {
    $className = $_POST['className'];
    $id = $_POST['id'];
    $sql = "UPDATE class SET classname = '$className' WHERE  id= $id";
    if ($conn->query($sql) === TRUE) {

        header('Location:showResult.php?Message= A class has been Updated. ');
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
            Results
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Results</li>
        </ol>
    </section>


    <?php if (isset($_GET['addmark'])) { ?> 
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="box-title ng-binding">Add Result</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal " method="post" action="showResult.php" >
                        <div class="form-group">
                            <label class="col-sm-2 control-label ng-binding">Select Class</label>
                            <div class="col-sm-10">
                                <select name="class" class="form-control">
                                    <?php echo get_SelectList("class", "classname", "classname", "classname"); ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label ng-binding">Select Subject</label>
                            <div class="col-sm-10">
                                <select name="subject" class="form-control">
                                    <?php
                                    $sql = "SELECT DISTINCT subjectname FROM subject ORDER BY subjectname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?= $row['subjectname']; ?>"><?= $row['subjectname']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10"> 
                                <input type="submit" class="btn btn-primary ng-binding" value="View Student" name="viewstudent" >
                            </div>
                        </div>
                    </form> 
                </div>
            </div>

        </section>
    <?php } ?>


    <?php
    if (isset($_POST['viewstudent'])) {
        // print_r($_POST);
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        ?> 
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="box-title ng-binding">Add Result</h3>
                    <?php //echo get_SelectListbyRow("student","id", "name", "name", "class",$class);   ?>
                </div>
                <div class="box-body">
                    <form class="form-horizontal " method="post" action="showResult.php" >
                        <div class="form-group">
                            <label class="col-sm-2 control-label ng-binding">Select Student</label>
                            <div class="col-sm-10">
                                <select name="studentid" class="form-control">
                                    <?php echo get_SelectListbyRow("student", "id", "name", "name", "class", $class); ?>
                                </select>
                                <input type="hidden" name="class" value="<?= $class; ?>">
                                <input type="hidden" name="subject" value="<?= $subject; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10"> 
                                <input type="submit" class="btn btn-primary ng-binding" value="Add Mark" name="addresult" >
                            </div>
                        </div>
                    </form> 
                </div>
            </div>

        </section>
    <?php } ?>




    <?php
    if (isset($_POST['addresult']) || isset($_GET['editmark'])) {
        $class = get_className($LOGIN_ID);

        if (isset($_GET['editmark'])) {

            $subject = $_GET['sub'];
            $studentid = $_GET['stu'];
        } else {

            $class = $_POST['class'];
            $subject = $_POST['subject'];
            $studentid = $_POST['studentid'];
        }
        $sql = "SELECT * FROM result where sid=$studentid and sub='$subject'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        ?> 
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="box-title ng-binding">Add Result</h3>
                    <h4 class="pull-center" align="center"><?php echo get_studentName($studentid); ?></h4>
                    <table class="table-responsive table">
                        <tr><th>Class</th><td><?= $class; ?></td><th>Subject</th><td><?= $subject; ?></td></tr>
                    </table>
                    <hr>
                </div>
                <div class="box-body">
                    <form class="form-horizontal " method="post" action="showResult.php" >
                        <div class="row">
                            <div class="col-md-3"><label> CT1</label><input type="number" class="form-control" name="ct1" value="<?= $row['ct1']; ?>" ></div>
                            <div class="col-md-3"><label> CT2</label><input type="number" class="form-control" name="ct2"  value="<?= $row['ct2']; ?>"></div>
                            <div class="col-md-3"><label> CT3</label><input type="number" class="form-control" name="ct3"  value="<?= $row['ct3']; ?>"></div>
                            <div class="col-md-3"><label> CT4</label><input type="number" class="form-control" name="ct4"  value="<?= $row['ct4']; ?>"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"><label> ASS1</label><input type="number" class="form-control" name="ass1"  value="<?= $row['ass1']; ?>"></div>
                            <div class="col-md-3"><label> ASS2</label><input type="number" class="form-control" name="ass2"  value="<?= $row['ass2']; ?>"></div>
                            <div class="col-md-3"><label> MID</label><input type="number" class="form-control" name="mid"  value="<?= $row['mid']; ?>"></div>
                            <div class="col-md-3"><label> FINAL</label><input type="number" class="form-control" name="final"  value="<?= $row['final']; ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> ATTENDANCE </label><input type="number" class="form-control" name="att" value="<?= $row['attendance']; ?>" >
                            </div>
                        </div>
                        <div class="row pull-right">
                            <input type="hidden" name="class" value="<?= $class; ?>">
                            <input type="hidden" name="subject" value="<?= $subject; ?>">
                            <input type="hidden" name="studentid" value="<?= $studentid; ?>">
                            <?php if (isset($_POST['addresult'])) { ?>

                                <input type="submit" class="btn btn-primary" name="saveresult" value="Save Mark">

                            <?php } else { ?>
                                <input type="submit" class="btn btn-primary" name="updatemark" value="Update Mark">
                            <?php } ?>
                        </div>

                    </form> 
                </div>
            </div>

        </section>
    <?php } ?>





    <section class="content">
        <?php if (isset($_GET['Message'])) {
            ?>
            <div class="col-md-12 pull-right">
                <div class="alert alert-success">
                    <strong>Success ! </strong><?php if (isset($Message)) echo $Message; ?> </div>
            </div>
        <?php }if ($LOGIN_TYPE == "admin" || $LOGIN_TYPE == "teacher") { ?> 

            <a href="showResult.php?addmark=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add Result</a>
            <div class="btn-group pull-right no-print">
                <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
                <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only ng-binding">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="teachers/export" >Export to Excel</a></li>
                    <li><a href="teachers/exportpdf" target="_BLANK" >Export to PDF</a></li>
                </ul>
            </div>
            <div class="btn-group pull-right no-print">
                <button type="button" class="btn btn-success btn-flat ng-binding">Import</button>
                <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only ng-binding">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a ng-click="import('excel')" >Import from Excel</a></li>
                </ul>
            </div>
            <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
            <div class="box col-xs-12">
                <?php ?>

                <div class="box-body table-responsive">

                    <h2 class="text-uppercase"><?= $LOGIN_TYPE; ?> : <?= $LOGIN_NAME; ?></h2> 

                    <table class="table table-hover table-bordered">
                        <tbody><tr> 
                                <th >Name</th>
                                <th >SUBJECT</th>  
                                <th>CT1</th>
                                <th>CT2</th>
                                <th>CT3</th>
                                <th>CT4</th>
                                <th>ASS 1</th>
                                <th>ASS 2</th>
                                <th>MID</th>
                                <th>FINAL</th>
                                <th>ATTENDANCE</th>
                                <th>TOTAL</th> 
                                <th>CGPA</th> 

                                <th class="no-print ng-binding">Operations</th>
                            </tr>
                            <?php
                            if ($LOGIN_TYPE == "admin" || $LOGIN_TYPE == "teacher") {
                                if ($LOGIN_TYPE == "admin") {
                                    $sql = "SELECT * FROM result";
                                } elseif($LOGIN_TYPE == "teacher") {
                                    $sql = "SELECT * FROM result where sub='$LOGIN_SUBJECT'";
                                }
                            }
                            if ($LOGIN_TYPE == "student") {
                                $sql = "SELECT * FROM result where sid='$LOGIN_ID'";
                            }
                           echo $sql;
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $total = $row["ct1"] + $row["ct2"] + $row["ass1"] + $row["attendance"] + $row["mid"] + $row["final"];
                                    ?>
                                    <tr>
                                        <td><?php echo get_studentName($row['sid']); ?></td> 
                                        <td><?= $row["sub"]; ?></td>
                                        <td><?= $row["ct1"]; ?></td>
                                        <td><?= $row["ct2"]; ?></td>
                                        <td><?= $row["ct3"]; ?></td>
                                        <td><?= $row["ct4"]; ?></td>

                                        <td><?= $row["ass1"]; ?></td>
                                        <td><?= $row["ass2"]; ?></td>

                                        <td><?= $row["mid"]; ?></td>
                                        <td><?= $row["final"]; ?></td>
                                        <td><?= $row["attendance"]; ?></td>
                                        <td><?= $row["total"]; ?></td>
                                        <td><?= $row["cgpa"]; ?></td>
                                        <td class="no-print">
                                            <a  href="showResult.php?id=<?= $row["id"]; ?>&editmark=yes&sub=<?= $row['sub']; ?>&stu=<?= $row['sid']; ?>" 
                                                class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a    href="showResult.php?id=<?= $row["id"]; ?>&deletemark=yes"" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                        </td>
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

            <?php } if ($LOGIN_TYPE == "student") { ?>
                <div class="box col-xs-12">
                    <div class="box-body table-responsive">

                        <h2><?= $LOGIN_NAME; ?></h2>

                        <table class="table table-hover table-bordered">
                            <tbody><tr> 
                                    <th >SI. No</th>
                                    <th >SUBJECT</th>  
                                    <th>CT1</th>
                                    <th>CT2</th>
                                    <th>CT3</th>
                                    <th>CT4</th>
                                    <th>ASS 1</th>
                                    <th>ASS 2</th>
                                    <th>MID</th>
                                    <th>FINAL</th>
                                    <th>ATTENDANCE</th>
                                    <th>TOTAL</th> 
                                    <th>CGPA</th> 

                                    <th class="no-print ng-binding">Operations</th>
                                </tr>
                                <?php
                                $sql = "SELECT * FROM result where sid=$LOGIN_ID";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $count = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $count++;
                                        ///  $total = $row["ct1"] + $row["ct2"] + $row["ass1"] + $row["attendance"] + $row["mid"] + $row["final"];
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td> 
                                            <td><?= $row["sub"]; ?></td>
                                            <td><?= $row["ct1"]; ?></td>
                                            <td><?= $row["ct2"]; ?></td>
                                            <td><?= $row["ct3"]; ?></td>
                                            <td><?= $row["ct4"]; ?></td>

                                            <td><?= $row["ass1"]; ?></td>
                                            <td><?= $row["ass2"]; ?></td>

                                            <td><?= $row["mid"]; ?></td>
                                            <td><?= $row["final"]; ?></td>
                                            <td><?= $row["attendance"]; ?></td>
                                            <td><?= $row["total"]; ?></td>
                                            <td><?= $row["cgpa"]; ?></td>

                                            <td class="no-print">
                                                <a  href="showResult.php?id=<?= $row["id"]; ?>&editclass=yes" class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a    href="showResult.php?id=<?= $row["id"]; ?>&deleteclass=yes"" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                            </td>
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

                <?php } ?>
            </div>
    </section>


</div>




<?php
include("footer.php");
?>
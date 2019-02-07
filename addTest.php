<?php
include("connection.php");
$Message = "";
$name = "";

if (isset($_GET['deleteaddTest'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM onlinetest WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:addTest.php?Message= A Add Test has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['savequestion'])) {
    $onlinetestid = $_POST['onlinetestid'];
    $question = $_POST['question'];
    $choice1 = $_POST['choice1'];
    $choice2 = $_POST['choice2'];
    $choice3 = $_POST['choice3'];
    $choice4 = $_POST['choice4'];
    $correctans = $_POST['correctans']; 
     
    $sql = "INSERT INTO onlinequestion( onlinetest_id, question, choice1, choice2, choice3, choice4, correctans)"
            . "VALUES ('$onlinetestid','$question','$choice1','$choice2','$choice3','$choice4','$correctans')";
    if ($conn->query($sql) === TRUE) {

        header('Location:addTest.php?Message= A new Question has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['submit'])) {
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $testname = $_POST['testname'];
    $date = $_POST['date'];
    $totalquestion = $_POST['totalquestion'];
    $sql = "INSERT INTO onlinetest (batch, course, testname, totalquestion, date, datetime) "
            . "VALUES ('$batch','$course','$testname','$totalquestion','$date',now())";
    if ($conn->query($sql) === TRUE) {

        header('Location:addTest.php?Message= A new addTest has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql = "UPDATE onlinetest SET name = '$name' WHERE  id= $id";
    if ($conn->query($sql) === TRUE) {

        header('Location:addTest.php?Message= A add Test has been Updated. ');
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
            Add Test

            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">addTest</li>
        </ol>
    </section>


    <?php
    if (isset($_GET['setonlinetest'])) {

        $id = $_GET['id'];
        $sql = "SELECT * FROM onlinetest where id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $onlinetestid = $row['id'];
            $course = $row['course'];
            $batch = $row['batch'];
            $testname = $row['testname'];
            $totalquestion = $row['totalquestion'];
            $date = $row['date'];
        }
        ?>
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="text-center">Add Question Set</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-blue"><strong>Course :</strong> <?= $course; ?> </p>
                        </div>

                        <div class="col-md-3">
                            <p class="text-blue"><strong>Batch  :</strong> <?= $batch; ?> </p>

                        </div>
                        <div class="col-md-3">
                            <p class="text-blue"><strong>Test Name :</strong> <?= $testname; ?> </p>

                        </div>
                        <div class="col-md-3">
                            <p class="text-blue"><strong>Date :</strong> <?= $date; ?> </p>

                        </div>
                    </div>
                </div>
                <div class="box-body"> 

                    <div class="row"> 
                        <?php
                        $totalcount = 0;
                    //    while ($totalcount <= $totalquestion) {
                            $totalcount++;
                            ?>
                            <form name="form1" method="post" action="addTest.php" class="form-horizontal ">  
                                <div class="form-group">
                                    <label class="col-sm-2 control-label ng-binding">Question</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="question" class="form-control" placeholder="Write a question...">
                                    </div>
                                </div> 


                                <div class="form-group">
                                    <label class="col-sm-2 control-label ng-binding">Multiple Choice 1</label>
                                    <div class="col-sm-10">                                     
                                        <input type="text" name="choice1" class="form-control" placeholder="Option 1">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label ng-binding">Multiple Choice 2</label>
                                    <div class="col-sm-10">                                     
                                        <input type="text" name="choice2" class="form-control" placeholder="Option 2">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label ng-binding">Multiple Choice 3</label>
                                    <div class="col-sm-10">                                     
                                        <input type="text" name="choice3" class="form-control" placeholder="Option 3">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label ng-binding">Multiple Choice 4</label>
                                    <div class="col-sm-10">                                     
                                        <input type="text" name="choice4" class="form-control" placeholder="Option 4">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label ng-binding">Correct Answer</label>
                                    <div class="col-sm-10">                                     
                                        <input type="text" name="correctans" class="form-control" placeholder="Correct Answer">
                                        <input type="hidden" name="onlinetestid" value="<?=$onlinetestid;?>">
                                       
                                    </div>
                                </div>  

                                <div class="form-group"> 
                                    <div class="col-md-offset-8 col-md-4">
                                        <a href="addTest.php" class="btn btn-danger" >Back</a>
                                        <?php if ($totalquestion == $totalcount) { ?>
                                            <input type="submit" name="savequestion"  value="Add Question" class="btn btn-primary" >
                                        <?php } else { ?>
                                            <input type="submit" name="savequestion"  value="Next Question" class="btn btn-primary" >
                                            <?php
                                        }
                              //      }
                                    ?>
                                </div>


                            </div>

                        </form> 

                    </div>

                </div>
            </div>

        </section>
        <?php
    }



    if (isset($_GET['addaddTest']) || isset($_GET['editaddTest'])) {
        ?>


        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="box-title ng-binding">Add Test</h3>
                </div>
                <div class="box-body"> 

                    <div class="row"> 

                        <form name="form1" method="post" action="addTest.php" class="form-horizontal ">  
                            <div class="form-group">
                                <label class="col-sm-2 control-label ng-binding">Select Batch</label>
                                <div class="col-sm-10">
                                    <select name="batch" class="form-control">
                                        <?php
                                        $sql = "SELECT * FROM class ORDER BY classname";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                ?>

                                                <option value="<?= $row['classname']; ?>"><?= $row['classname']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 


                            <div class="form-group">
                                <label class="col-sm-2 control-label ng-binding">Select Course</label>
                                <div class="col-sm-10">
                                    <select name="course" class="form-control">
                                        <?php
                                        if ($LOGIN_TYPE == "teacher") {

                                            $sql = "SELECT * FROM subject where subjectname='$LOGIN_SUBJECT' ORDER BY subjectname";
                                        } else {
                                            $sql = "SELECT * FROM subject ORDER BY subjectname";
                                        }
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
                                <label class="col-sm-2 control-label ng-binding"> Enter Test Name </label>
                                <div class="col-sm-10">
                                    <select name="testname" class="form-control">
                                        <option value="ct1">CT1</option>
                                        <option value="ct2">CT2</option>
                                        <option value="ct3">CT3</option>
                                        <option value="ct4">CT4</option> 
                                    </select>
                                </div>
                            </div> 


                            <div class="form-group">
                                <label class="col-sm-2 control-label ng-binding"> Date </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date" > 
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-2 control-label ng-binding"> Total Question </label>
                                <div class="col-md-10">
                                    <input name="totalquestion" type="number"  required id="totque" value="10" class="form-control" max="10" min="0">
                                </div>
                            </div> 


                            <div class="form-group"> 
                                <div class="col-md-offset-8 col-md-4">
                                    <a href="addTest.php" class="btn btn-danger" >Back</a>
                                    <input type="submit" name="submit"  value="Add Test" class="btn btn-primary" >
                                </div>


                            </div>

                        </form> 

                    </div>

                </div>
            </div>

        </section>
        <?php
    }

    if ($LOGIN_TYPE == "admin") {
        ?>




        <section class="content">
            <?php if (isset($_GET['Message'])) {
                ?>
                <div class="col-md-12 pull-right"><div class="alert alert-success">
                        <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
            <?php } ?> 

            <a href="addTest.php?addaddTest=yes"  
               class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add Test</a>
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
                    <h3 class="box-title ng-binding">List Online Tests</h3>

                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <tbody><tr> 
                                <th>SI. No </th>
                                <th class="ng-binding">Batch </th>
                                <th class="ng-binding">Course</th>  
                                <th class="ng-binding">Test Name</th> 
                                <th class="ng-binding">Total Question</th>
                                <th class="ng-binding">Date</th>   
                                <th class="no-print ng-binding">Operations</th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM onlinetest";
                            $result = $conn->query($sql);
                            $count = 0;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $count++;
                                    ?>


                                    <tr  >
                                        <td class="ng-binding"><?= $count; ?></td>

                                        <td class="ng-binding"><?= $row["batch"]; ?></td> 
                                        <td class="ng-binding"><?= $row["course"]; ?></td> 
                                        <td class="ng-binding"><?= $row["testname"]; ?></td> 
                                        <td class="ng-binding"><?= $row["totalquestion"]; ?></td> 
                                        <td class="ng-binding"><?= $row["date"]; ?></td>  
                                        <td class="no-print">
                                            <a  href="addTest.php?id=<?= $row["id"]; ?>&setonlinetest=yes" class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Set Question"><i class="fa fa-check-square-o"></i></a>
                                            <a    href="addTest.php?id=<?= $row["id"]; ?>&deleteaddTest=yes"" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No addTest</td></tr>';
                            }
                            ?>


                        </tbody></table>
                </div>
            </div>
        </section>

    <?php } ?>
</div>




<?php
include("footer.php");
?>
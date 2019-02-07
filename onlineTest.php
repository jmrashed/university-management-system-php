<?php
include("connection.php");
$Message = "";
$name = "";

if (isset($_GET['deletedepartment'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM department WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:departments.php?Message= A Department has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO department (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {

        header('Location:departments.php?Message= A new department has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql = "UPDATE department SET name = '$name' WHERE  id= $id";
    if ($conn->query($sql) === TRUE) {

        header('Location:departments.php?Message= A department has been Updated. ');
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
            Department

            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">department</li>
        </ol>
    </section>

    <section class="content">
        <div class="box col-xs-12">
            <div class="box-header">

                <h3 class="box-title ng-binding">Start Online Test</h3>
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
                            <div class="col-md-offset-8 col-md-4">
                                <a href="onlineTest.php" class="btn btn-danger" >Back</a>
                                <input type="submit" name="submit"  value="Start Online Test" class="btn btn-primary" >
                            </div>


                        </div>

                    </form> 

                </div>

            </div>
        </div>

    </section>

    <section class="content">
        <div class="box col-xs-12">
            <div class="box-header">

                <h3 class="box-title ng-binding">Start Online Test</h3>
            </div>
            <div class="box-body"> 

                <div class="row">
                    <div class="count"></div>

                    <script id="count-template" type="text/template">
                        <span class="current top <%= currentSize %>"><%= time %></span>
                        <span class="next top <%= nextSize %>"><%= nextTime %></span>
                        <span class="current bottom <%= currentSize %>"><%= time %></span>
                        <span class="next bottom <%= nextSize %>"><%= nextTime %></span>
                    </script>


                    <form name="form1" method="post" action="addTest.php" class="form-horizontal ">  



                        <?php
                        $sql = "SELECT * FROM onlinequestion where onlinetest_id=2"; 
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) { 
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-8 control-label ng-binding"><?= $row['question']; ?></label>
                                    <div class="col-sm-4">
                                        <input type="radio"  name="qustion<?= $row['id']; ?>" value="<?= $row['choice1']; ?>" > <?= $row['choice1']; ?><br>
                                        <input type="radio"  name="qustion<?= $row['id']; ?>" value="<?= $row['choice2']; ?>" > <?= $row['choice2']; ?><br>
                                        <input type="radio"  name="qustion<?= $row['id']; ?>" value="<?= $row['choice3']; ?>" > <?= $row['choice3']; ?><br>
                                        <input type="radio"  name="qustion<?= $row['id']; ?>" value="<?= $row['choice4']; ?>" > <?= $row['choice4']; ?><br>

                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>


                </div> 


                <div class="form-group"> 
                    <div class="col-md-offset-8 col-md-4">
                        <a href="onlineTest.php" class="btn btn-danger" >Back</a>
                        <input type="submit" name="submit"  value="Submit" class="btn btn-primary" >
                    </div>


                </div>

                </form> 

            </div>

        </div>
</div>

</section>
</div>




<?php
include("footer.php");
?>
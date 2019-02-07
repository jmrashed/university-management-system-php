<?php
if (isset($_POST['submitnotice'])) {
    $title = $_POST['title'];
    $notice = $_POST['notice'];
    $userid = $_POST['userid'];
    $acesslabel = $_POST['acesslabel'];
    $sql = "INSERT INTO notice (userid,title,notice,creatortype, acesslabel,datetime) "
            . "VALUES ('$userid', '$title','$notice','$LOGIN_TYPE','$acesslabel',now()  )";
    if ($conn->query($sql) === TRUE) {

        $Message = "A new notice has been Saved. ";
    } else {
        $Message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (isset($_POST['submitmessage'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $adminid = $_POST['adminid'];
    $receiverid = $_POST['receiverid'];
    $receivertype = $_POST['receivertype'];
    $sendertype = $_POST['sendertype'];
    $sql = "INSERT INTO message (senderid,receiverid, title,message,isread,receivertype,sendertype, datetime) "
            . "VALUES ('$adminid','$receiverid', '$title','$message',0,'$receivertype','$sendertype',now()  )";
    if ($conn->query($sql) === TRUE) {

        $SendMessage = "A new Message has been Send. ";
    } else {
        $SendMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            <a href="adminhome.php">   <span class="text-uppercase"> <?= $LOGIN_TYPE; ?>    Dashboard </span>
                <small>Control panel</small> </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <?php if (($LOGIN_TYPE == 'admin') || ($LOGIN_TYPE == 'teacher')) { ?>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo get_RowNumber("student"); ?></h3>

                            <p>Total Student</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="students.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo get_RowNumber("teacher"); ?></h3>

                            <p>Total Teacher</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="teachers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo get_RowNumber("class"); ?></h3>

                            <p>Total Class</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="classes.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo get_RowNumber("subject"); ?></h3>

                            <p>Total Subject</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="subjects.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        <?php } ?>
        <div class="row">
            <?php if ($LOGIN_TYPE == 'admin' || $LOGIN_TYPE == 'teacher') {  ?>
            <div class="col-md-6">
                <h2> Create a notice </h2>
                <?php
                if (isset($Message)) {
                    echo '<span class="pull-right label label-primary"> ' . $Message . '</span>';
                }
                ?>
                <form class="form-horizontal" action="adminhome.php" method="post" >
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" > 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Notice</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="notice"></textarea>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label ">Select Published Mode</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="acesslabel" > 
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select></div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" value="<?= $LOGIN_ID; ?>" name="userid">
                            <input type="submit" name="submitnotice" class="btn btn-success" value="Published">
                        </div>
                    </div>
                </form>

            </div>

        <?php } ?>
            <div class="col-md-6">
                <h2> Send a Message </h2>
                <form class="form-horizontal" action="adminhome.php" method="post">
                    <?php
                    if (isset($SendMessage)) {
                        echo '<span class="pull-right label label-primary"> ' . $SendMessage . '</span>';
                    }

                    if ($LOGIN_TYPE == 'admin' || $LOGIN_TYPE == 'student') {
                        if ($LOGIN_TYPE == 'admin') {
                            $sendertype = "admin";
                        }
                        if ($LOGIN_TYPE == 'student') {
                            $sendertype = "student";
                        }
                        ?>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Select Teacher</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="receiverid" > 
                                    <?php
                                    $sql = "SELECT * FROM teacher ORDER BY name";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?> 

                                </select>
                                <input type="hidden" name="receivertype" value="teacher">

                                <input type="hidden" name="sendertype" value="<?= $sendertype; ?>">
                            </div>

                        <?php } else { ?>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label ">Select Admin</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="receiverid" > 
                                        <?php
                                        $sql = "SELECT * FROM admin ORDER BY name";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                ?>

                                                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?> 

                                    </select>
                                    <input type="hidden" name="receivertype" value="admin">
                                    <input type="hidden" name="sendertype" value="teacher">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" > 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" value="<?= $LOGIN_ID; ?>" name="adminid">
                                <input type="submit" name="submitmessage" class="btn btn-success" value="Send Message">
                            </div>
                        </div>
                </form>

            </div>

        </div>
    </section>

</div>  

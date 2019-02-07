<?php 
include './connection.php';
$Message = "";
$id = "";
$name = "";
$degree = "";
$designation = "";
$subject = "";
$email = "";
$phone = "";
$joindate = "";
$designation = "";
$address = ""; 
$gender = "";


if (isset($_GET['deleteteacher'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM teacher WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:teachers.php?Message= A teacher has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $joindate = $_POST['joindate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $degree = $_POST['degree'];
    $designation = $_POST['designation'];

    $sql = "INSERT INTO  teacher  (name ,  degree ,  designation ,  email ,  password ,  gender , 
          joindate ,  address ,  phone ,  subject ,  datetime )
            VALUES ( '$name', '$degree', '$designation', '$email', '$password', '$gender', "
            . "'$joindate', '$address', '$phone', '$subject', now())";
    if ($conn->query($sql) === TRUE) {

        header('Location:teachers.php?Message= A teacher has been Saved. ');
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
            Teachers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teachers</li>
        </ol>
    </section>
    <?php
    if (isset($_GET['viewteacher'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM teacher where id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $name = $row["name"];
                $degree = $row["degree"];
                $designation = $row["designation"];
                $subject = $row["subject"];
                //$subject = get_subjectName($subject);
                $email = $row["email"];
                $gender = $row["gender"];
                $phone = $row["phone"];
                $address = $row["address"];
                $joindate = $row["joindate"];
                $designation = $row["designation"];
                $password = $row['password'];
                $datetime = $row['datetime'];
            }
        }
        ?>   
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title ng-binding"><i class="fa fa-info-circle" aria-hidden="true"></i> Teacher Information</h3>

                    <span class="pull-right"> 
                        <a href="sendmessage.php?teacherId=<?= $id; ?>" class="btn btn-primary" > 
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Message</a> 
                        <a class="btn-danger btn" href="teachers.php"><i class="fa fa-times" aria-hidden="true"></i> Close </a></span>
                </div>
                <div class="col-md-4">
                    <img src="images/1.jpg" class="img img-rounded img-responsive" ><br>
                    <h3><?= $name; ?></h3>
                    <i class="danger"> <b>Published: </b> <?= $datetime; ?></i>
                </div>
                <div class="col-md-8">
                    <table class="table table-responsive table-striped table-bordered">
                        <tr> <th> Full Name</th><td><b> <?= $name; ?> </b> </td></tr>
                        <tr> <th> Designation</th><td> <?= $designation; ?> </td></tr>
                        <tr> <th> Degree</th><td> <?= $degree; ?> </td></tr>
                        <tr> <th> Email</th><td> <?= $email; ?> </td></tr>
                        <tr> <th> Phone Number</th><td> <?= $phone; ?> </td></tr>
                        <tr> <th> Address</th><td> <?= $address; ?> </td></tr>
                        <tr> <th> Join Date</th><td> <?= $joindate; ?> </td></tr>
                        <tr> <th> Gender</th><td> <?= $gender; ?> </td></tr>
                        <tr> <th> Subject </th><td> <?= $subject; ?> </td></tr>
                    </table>

                </div>

            </div>
        </section>
        <?php
    }
    if (isset($_GET['addteacher']) || isset($_GET['editteacher'])) {
        ?>

        <?php
        //initial_variable();
        if (isset($_GET['editteacher'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM teacher where id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $name = $row["name"];
                    $degree = $row["degree"];
                    $designation = $row["designation"];
                    $subject = $row["subject"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $address = $row["address"];
                    $joindate = $row["joindate"];
                    $designation = $row["designation"];
                    $password = $row['password'];
                }
            }
        }
        ?>
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title ng-binding">Add teacher</h3>
                </div>
                <div class="box-body ">
                    <form class="form-horizontal" method="post" action="teachers.php" >
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Full name * </label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $name; ?>" name="name" class="form-control" required="" placeholder="Full name">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Designation </label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $designation; ?>"  name="designation" class="form-control" required="" placeholder="Designation">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Last Degree </label>
                            <div class="col-sm-10">
                                <input type="text" name="degree" value="<?= $degree; ?>"  class="form-control" required="" placeholder="Last Degree">
                            </div>
                        </div> 


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Email address *</label>
                            <div class="col-sm-10">
                                <input type="email"  value="<?= $email; ?>"  name="email" class="form-control" placeholder="Email address" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Password *</label>
                            <div class="col-sm-10">
                                <input 
                                <?php if (isset($_GET['editteacher'])) {
                                    echo 'type="text"';
                                } else {
                                    echo 'type="password"';
                                } ?>
                                    value="<?= $password; ?>"  name="password" class="form-control" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Gender</label>
                            <div class="col-sm-10">

                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="male" <?php if (($gender = "male") || ($gender = "")) {
                                    echo 'Checked';
                                } ?>>
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="female"   >
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        
                     
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Join Date</label>
                            <div class="col-sm-10">
                                <input type="date" id="datemask" value="<?= $joindate; ?>" name="joindate"  class="form-control datemask ng-pristine ng-valid">
                            </div>
                        </div>
                        
                        <div date-picker="" selector=".datemask"></div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" value="<?= $address; ?>" class="form-control ng-pristine ng-valid" ng-model="form.address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Phone No</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" value="<?= $phone; ?>" class="form-control ng-pristine ng-valid" ng-model="form.phoneNo" placeholder="Phone No">
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

                                            <option value="<?= $row['subjectname']; ?>"  ><?= $row['subjectname']; ?></option>
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
                                       <?php if (isset($_GET['editteacher'])) { ?>

                                    <input type="submit" name="update"  class="btn btn-primary ng-binding" value=Update teacher">
    <?php } else { ?>
                                           <input type="submit" name="submit"  class="btn btn-primary ng-binding" value=Add teacher">

    <?php } ?>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
<?php } ?>


    <section class="content ng-scope">
<?php if (isset($_GET['Message'])) {
    ?>
            <div class="col-md-12 pull-right"><div class="alert alert-success">
                    <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
<?php } ?> 

        <a href=" teachers.php?addteacher=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add teacher</a>
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
                <h3 class="box-title ng-binding">List teachers</h3>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Full name</th> 
                            <th class="ng-binding">Designation</th>
                            <th class="ng-binding">Subject</th>
                            <th class="ng-binding">Email</th>
                            <th class="ng-binding">Phone</th>
                            <th class="ng-binding">Join Date</th>
                            <th class="no-print ng-binding">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM teacher";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                ?>


                                <tr total-items="totalItems" ng-repeat="teacher in teachers| itemsPerPage:20" class="ng-scope">
                                    <td class="ng-binding"><?= $row["id"]; ?></td>
                                    <td>
                                        <a href="teachers.php?id=<?= $id; ?>&viewteacher=yes" class="ng-binding"><?= $row["name"]; ?></a>

                                    </td>
                                    <td class="ng-binding"><?= $row["designation"]; ?></td>
                                    <td class="ng-binding"><?=$row["subject"]; ?></td>
                                    <td class="ng-binding"><?= $row["email"]; ?></td>
                                    <td class="ng-binding"><?= $row["phone"]; ?></td>
                                    <td class="ng-binding"><?= $row["joindate"]; ?></td> 
                                    <td class="no-print">
                                        <a  href="teachers.php?id=<?= $id; ?>&editteacher=yes"  class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="teachers.php?id=<?= $id; ?>&deleteteacher=yes" type="button" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

        <?php
    }
} else {
    echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Teacher</td></tr>';
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
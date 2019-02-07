<?php
include './connection.php';
$Message = "";
$id = "";
$name = "";
$degree = "";
$designation = "";
$department = "";
$email = "";
$phone = "";
$joindate = "";
$designation = "";
$address = "";
$gender = "";


if (isset($_GET['deletestaff'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM staff WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:staffs.php?Message= A staff has been Deleted. ');
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
    $department = $_POST['department'];
    $degree = $_POST['degree'];
    $designation = $_POST['designation'];

    $sql = "INSERT INTO  staff  (name ,  degree ,  designation ,  email ,  password ,  gender , 
          joindate ,  address ,  phone ,  department ,  datetime )
            VALUES ( '$name', '$degree', '$designation', '$email', '$password', '$gender', "
            . "'$joindate', '$address', '$phone', '$department', now())";
    if ($conn->query($sql) === TRUE) {

        header('Location:staffs.php?Message= A staff has been Saved. ');
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
            Staffs
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="adminhome.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Staffs</li>
        </ol>
    </section>
    <?php
    if (isset($_GET['viewstaff'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM staff where id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $name = $row["name"];
                $degree = $row["degree"];
                $designation = $row["designation"];
                $department = $row["department"];
                //$department = get_departmentName($department);
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
                    <h3 class="box-title ng-binding"><i class="fa fa-info-circle" aria-hidden="true"></i> Staff Information</h3>

                    <span class="pull-right"> 
                        <a href="sendmessage.php?staffId=<?= $id; ?>" class="btn btn-primary" > 
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Message</a> 
                        <a class="btn-danger btn" href="staffs.php"><i class="fa fa-times" aria-hidden="true"></i> Close </a></span>
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
                        <tr> <th> Subject </th><td> <?= $department; ?> </td></tr>
                    </table>

                </div>

            </div>
        </section>
        <?php
    }
    if (isset($_GET['addstaff']) || isset($_GET['editstaff'])) {
        ?>

        <?php
        //initial_variable();
        if (isset($_GET['editstaff'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM staff where id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $name = $row["name"];
                    $degree = $row["degree"];
                    $designation = $row["designation"];
                    $department = $row["department"];
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
                    <h3 class="box-title ng-binding">Add staff</h3>
                </div>
                <div class="box-body ">
                    <form class="form-horizontal" method="post" action="staffs.php" >
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Full name * </label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $name; ?>" name="name" class="form-control" required="" placeholder="Full name">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Department</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department" > 
                                    <?php
                                    $sql = "SELECT * FROM department ORDER BY name";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?= $row['name']; ?>"  ><?= $row['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?> 

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Designation</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="designation" > 
                                    <option value="Register">Register</option>
                                    <option value="Peon">Peon</option>
                                    <option value="Security Guad">Security Guad</option>
                                    <option value="librarian"> Librarian </option>
                                    <option value="Others">Others</option>
                                </select>
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
                                <?php
                                if (isset($_GET['editstaff'])) {
                                    echo 'type="text"';
                                } else {
                                    echo 'type="password"';
                                }
                                ?>
                                    value="<?= $password; ?>"  name="password" class="form-control" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Gender</label>
                            <div class="col-sm-10">

                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="male" <?php
                                        if (($gender = "male") || ($gender = "")) {
                                            echo 'Checked';
                                        }
                                        ?>>
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
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                <?php if (isset($_GET['editstaff'])) { ?>

                                    <input type="submit" name="update"  class="btn btn-primary ng-binding" value=Update staff">
                                <?php } else { ?>
                                           <input type="submit" name="submit"  class="btn btn-primary ng-binding" value=Add staff">

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

        <a href=" staffs.php?addstaff=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add staff</a>
        
        
        <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title ng-binding">List staffs</h3>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Full name</th> 
                            <th class="ng-binding">Designation</th>
                            <th class="ng-binding">Department</th>
                            <th class="ng-binding">Email</th>
                            <th class="ng-binding">Phone</th>
                            <th class="ng-binding">Join Date</th>
                            <th class="no-print ng-binding">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM staff";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                ?>


                                <tr total-items="totalItems" ng-repeat="staff in staffs| itemsPerPage:20" class="ng-scope">
                                    <td class="ng-binding"><?= $row["id"]; ?></td>
                                    <td>
                                        <a href="staffs.php?id=<?= $id; ?>&viewstaff=yes" class="ng-binding"><?= $row["name"]; ?></a>

                                    </td>
                                    <td class="ng-binding"><?= $row["designation"]; ?></td>
                                    <td class="ng-binding"><?= $row["department"]; ?></td>
                                    <td class="ng-binding"><?= $row["email"]; ?></td>
                                    <td class="ng-binding"><?= $row["phone"]; ?></td>
                                    <td class="ng-binding"><?= $row["joindate"]; ?></td> 
                                    <td class="no-print">
                                       
                                        <a href="staffs.php?id=<?= $id; ?>&deletestaff=yes" type="button" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Staff</td></tr>';
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
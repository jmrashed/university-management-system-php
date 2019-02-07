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


    <?php if (isset($_GET['adddepartment']) || isset($_GET['editdepartment'])) { ?>

        <?php
        if (isset($_GET['editdepartment'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM department where id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                }
            }
        }
        ?> 

        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">

                    <h3 class="box-title ng-binding">Add Department</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal " method="post" action="departments.php" >
                        <div class="form-group has-error" >
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Department Name * </label>
                            <div class="col-sm-10">
                                <input type="text" name="name"   
                                       class="form-control ng-pristine ng-invalid ng-invalid-required" required=""
                                       placeholder="Department Name" value="<?= $name; ?>">
                                <input type="hidden" value="<?= $id; ?>" name="id">
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10"> 
                                <?php if (isset($_GET['editdepartment'])) { ?>
                                    <input type="submit" class="btn btn-primary ng-binding" value="Update department" name="update" >
                                <?php } else { ?>
                                    <input type="submit" class="btn btn-primary ng-binding" value="Add department" name="submit" >
                                <?php } ?>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    <?php } 
      if($LOGIN_TYPE=="admin"){
    ?>




    <section class="content">
        <?php if (isset($_GET['Message'])) {
            ?>
            <div class="col-md-12 pull-right"><div class="alert alert-success">
                    <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
        <?php } ?> 

        <a href="departments.php?adddepartment=yes"  
           class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add department</a>
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
                <h3 class="box-title ng-binding">List departments</h3>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Department name</th>  
                            <th class="no-print ng-binding">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM department";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>


                                <tr  >
                                    <td class="ng-binding"><?= $row["id"]; ?></td>

                                    <td class="ng-binding"><?= $row["name"]; ?></td> 
                                    <td class="no-print">
                                        <a  href="departments.php?id=<?= $row["id"]; ?>&editdepartment=yes" class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a    href="departments.php?id=<?= $row["id"]; ?>&deletedepartment=yes"" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No department</td></tr>';
                        }
                        ?>


                    </tbody></table>
                <dir-pagination-controls class="pull-right ng-isolate-scope" on-page-change="pageChanged(newPageNumber)" template-url="templates/dirPagination.html"><!-- ngIf: 1 < pages.length --></dir-pagination-controls>
            </div>
        </div>
    </section>

      <?php } ?>
</div>




<?php
    
include("footer.php");
?>
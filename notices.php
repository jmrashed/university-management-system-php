<?php
include("connection.php");
include("header.php");
include("leftsidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Notice

            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Notice</li>
        </ol>
    </section>



    <section class="content">
        <div class="box col-xs-12">
            <div class="box-header">

                <h3 class="box-title ng-binding">All Notice</h3>
            </div>
            <div class="box-body">

                <div class="row"> 


                    <?php
                    $sql = "SELECT * FROM notice ORDER BY datetime limit 5";
                    // echo $sql;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        ?>

                        <table class="table-responsive table-striped table">

                            <?php
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr><td>
                                        <label>Title : </label><a href="#"> <?= $row['title']; ?></a><br>
                                        <p class="text-justify"><b>Notice : </b><?= $row['notice']; ?></p>
                                        <span class="label label-danger">Published by <i><?php echo get_adminName($row['adminid']); ?></i> at <b><?= $row['datetime']; ?></b></span>




                                    <?php }
                                    ?>
                        </table> 
                    <?php }
                    ?> 


                </div>


            </div> 
        </div>
    </section> 

</div>




<?php
include("footer.php");
?>
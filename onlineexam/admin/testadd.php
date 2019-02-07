<?php
include("header.php");
if($LOGIN_TYPE=="admin" || $LOGIN_TYPE=="teacher" ){
?>
<div class="container"> 
    <div class="row">
        <?php
        echo "<br><h2><div  class=head1>Add Test</div></h2>";
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            $subid = $_POST['subid'];
            $testname = $_POST['testname'];
            $totque = $_POST['totque'];
            $sql = "insert into mst_test(teacherid, sub,test_name,total_que) values ('$LOGIN_ID','$subid','$testname','$totque')";
            // echo $sql;
            $conn->query($sql) ;
            echo "<p align=center style='color:green' class='text-uppercase'>Test <b>\"$testname\"</b> Added Successfully.</p>";
        }
        ?> 

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form name="form1" method="post" action="testadd.php" class="form-horizontal ">  
                        <div class="form-group">
                            <label class="col-sm-2 control-label ng-binding">Select Subject</label>
                            <div class="col-sm-10">
                                <select name="subid" class="form-control">
                                    <?php
                                    
                                        $sql = "SELECT * FROM subject ORDER BY subjectname";
                                    
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
                            <label class="col-md-2 control-label ng-binding"> Total Question </label>
                            <div class="col-md-10">
                                <input name="totque" type="number"  required id="totque" value="10" class="form-control" max="10" min="0">
                            </div>
                        </div> 


                        <div class="form-group">
                            <div class="col-md-10 pull-right">
                                <input type="submit" name="submit" style="width: 200px" value="Add Test" class="btn btn-primary" >
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>
        <?php include 'footer.php'; ?>
    </div>
<?php }
 else {
     echo $notaccess;    
 }
?>
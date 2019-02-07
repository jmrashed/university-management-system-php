<?php
$Message = "";
include("connection.php");
include("header.php");
include("leftsidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Message
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Message</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                                    <span class="label label-primary pull-right"> <?php echo get_RowNumber("message"); ?> </span></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                            <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Labels</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Inbox</h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <?php if(isset($_GET['view'])) {
                            ?>
                        
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php
                                     $id=$_GET['id'];
                                    
                                    $sql = "SELECT * FROM message where id=$id";
                                   // echo $sql;
                                    $result = $conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $count = 0;
                                        while($row = $result->fetch_assoc()){
                                       // $sender = get_adminName($row['senderid']);
                                        $receiveridd = $row['receiverid'];
                                        $title = $row['title'];
                                        $message = $row['message'];
                                        $isread = $row['isread'];
                                        $datetime = $row['datetime'];
                                        
                                    
                                    ?>

                                    <tr>
                                        <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html"><?=$title;?></a></td>
                                        <td class="mailbox-subject"><b><?=$title;?></b> <?=$message;?>
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 mins ago</td>
                                    </tr> 
                                    <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                                    <!-- /.table --> <?php } ?>
                        </div>
                        
                        
                            
                        <?php  } ?>
                        
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php
                                   
                                   // echo $sql;
                                    $sql = "SELECT * FROM message where receiverid=$LOGIN_ID and receivertype='$LOGIN_TYPE'";
                                    $result = $conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $count = 0;
                                        while($row = $result->fetch_assoc()){
                                      //  $sender = get_adminName($row['senderid']);
                                        $receiveridd = $row['receiverid'];
                                        $title = $row['title'];
                                        $message = $row['message'];
                                        $message = substr($message, 0, 30);
                                        $isread = $row['isread'];
                                        $datetime = $row['datetime'];
                                        
                                    
                                    ?>

                                    <tr>
                                        <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                        <td class="mailbox-name"><a href="message.php?view=yes&id=<?=$row['id'];?>"><?=$title;?></a></td>
                                        <td class="mailbox-subject"><?=$message;?>
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 mins ago</td>
                                    </tr> 
                                    <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                                    <!-- /.table --> <?php } ?>
                        </div>
                        
                        
                        
                        
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

</div>




<?php
include("footer.php");
?>
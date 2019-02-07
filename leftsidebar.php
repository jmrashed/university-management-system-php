<!-- Left side column. contains the logo and sidebar -->  
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $LOGIN_NAME; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <hr>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php if ($LOGIN_TYPE == "student") { ?>
                <li>
                    <a href="subjectlist.php">
                        <i class="fa fa-book" aria-hidden="true"></i><span>My Subjects </span> 
                    </a>
                </li>
                <li>  <a href="showResult.php"> <i class="fa fa-book" aria-hidden="true"></i><span>My Results </span>  </a>   </li>


                <li>  <a href="onlineexam/index.php"> <i class="fa fa-book" aria-hidden="true"></i><span>Online Exam </span>  </a>   </li>
                <li>  <a href="onlineexam/result.php"> <i class="fa fa-book" aria-hidden="true"></i><span>Online Exam Results </span>  </a>   </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> <span>My Profile</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li><a href="changePassword.php"><i class="fa fa-star"></i> My Profile</a></li>
                        <li><a href="changePassword.php?changePassword=yes"><i class="fa fa-edit"></i>Change Password</a></li>
                        <li><a href="message.php"><i class="fa fa-envelope"></i> Message</a></li>
                        <li><a href="logOut.php"><i class="fa fa-power-off"></i> Logout</a></li> 
                    </ul>
                </li> 
            <?php } elseif ($LOGIN_TYPE == "admin") { ?>



                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-university"></i> <span>Academic</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li>
                            <a href="departments.php">
                                <i class="fa fa-trophy"></i> <span>Departments </span> 
                            </a>
                        </li>
                        <li>
                            <a href="trimesters.php">
                                <i class="fa fa-rocket"></i> <span>Trimesters </span> 
                            </a>
                        </li>
                        <li>
                            <a href="students.php">
                                <i class="fa fa-users"></i> <span>Students </span> 
                            </a>
                        </li>
                        <li>
                            <a href="classes.php">
                                <i class="fa fa-tasks"></i> <span>Classes </span> 
                            </a>
                        </li> 


                        <li>
                            <a href="teachers.php">
                                <i class="fa fa-users"></i> <span>Teachers </span> 
                            </a>
                        </li>
                        <li>
                            <a href="staffs.php">
                                <i class="fa fa-user-plus"></i> <span>Staffs </span> 
                            </a>
                        </li>
                        <li>
                            <a href="subjects.php">
                                <i class="fa fa-list"></i> <span>Subjects </span> 
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Students</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li><a href="students.php?addstudent=yes"><i class="fa fa-user-plus"></i>Add Student</a></li>
                        <li><a href="students.php"><i class="fa fa-users"></i> Student List</a></li>
                        <li><a href="students.php?search=yes"><i class="fa fa-filter"></i> Student Search</a></li>
                        <li><a href="students.php?parents=yes"><i class="fa fa-info-circle"></i> Student Parents</a></li> 
                    </ul>
                </li> 

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-server"></i> <span>Exams</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li> <a href="exams.php">  <i class="fa fa-qrcode"></i> <span>Exams </span>   </a> </li>

                        <li>
                            <a href="onlineexam/admin/index.php">
                                <i class="fa fa-puzzle-piece"></i> <span>Online Exams </span> 
                            </a>
                        </li>
                        <li> <a href="onlineexam/admin/index.php"><i class="fa fa-puzzle-piece"></i> <span>Online Exams </span>  </a>  </li> 
                    </ul>
                </li> 


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Results</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li>  <a href="showResult.php"> <i class="fa fa-book" aria-hidden="true"></i><span>All Result </span>  </a>   </li>
                        <li><a href="getResult.php"><i class="fa fa-edit"></i>Show Result</a></li>
                        <li><a href="results.php"><i class="fa fa-file-word-o"></i> <span> Results </span></a></li>
                    </ul>
                </li> 
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-beer"></i> <span> Facilites </span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">  
                        <li> <a href="transports.php"> <i class="fa fa-car"></i> <span>Transport </span> </a>  </li> 
                        <li> <a href="library.php"> <i class="fa fa-book"></i> <span>Library </span> </a>  </li> 
                        <li> <a href="library.php"> <i class="fa fa-bug"></i> <span>Lab </span> </a>  </li> 
                        <li> <a href="library.php"> <i class="fa fa-calendar-check-o"></i> <span>Debet Club </span> </a>  </li> 

                    </ul>
                </li> 




                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> <span>My Profile</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li><a href="changePassword.php"><i class="fa fa-star"></i> My Profile</a></li>
                        <li><a href="changePassword.php?changePassword=yes"><i class="fa fa-edit"></i>Change Password</a></li>
                        <li><a href="message.php"><i class="fa fa-envelope"></i> Message</a></li>
                        <li><a href="logOut.php"><i class="fa fa-power-off"></i> Logout</a></li> 
                    </ul>
                </li> 




                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span> Others </span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">   
                        <li>
                            <a href="calendar.php">
                                <i class="fa fa-calendar-check-o"></i> <span>Calendar </span> 
                            </a>
                        </li>
                        <li>
                            <a href="notices.php">
                                <i class="fa fa-tasks"></i> <span>Notice </span> 
                            </a>
                        </li>

                    </ul>
                </li> 







                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="message.php">Inbox <span class="label label-primary pull-right">13</span></a>
                        </li>
                        <li><a href="compose.php">Compose</a></li>
                        <li><a href="readMessage.php">Read</a></li>
                    </ul>
                </li>
        

       <?php } elseif ($LOGIN_TYPE == "teacher") { ?>
       
      <li>  <a href="adminhome.php">
                        <i class="fa fa-university"></i> <span>Home</span> 
                    </a>
                    </li>
                    
                     <li>
                            <a href="students.php">
                                <i class="fa fa-users"></i> <span>Students </span> 
                            </a>
                        </li>
    <li class="treeview">
                    <a href="#">
                        <i class="fa fa-server"></i> <span>Exams</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li> <a href="exams.php">  <i class="fa fa-qrcode"></i> <span>Exams </span>   </a> </li>

                        <li>
                            <a href="onlineexam/admin/index.php">
                                <i class="fa fa-puzzle-piece"></i> <span>Online Exams </span> 
                            </a>
                        </li>
 
                    </ul>
                </li> 

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Results</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li>  <a href="showResult.php"> <i class="fa fa-book" aria-hidden="true"></i><span>All Result </span>  </a>   </li>
 
                    </ul>
                </li> 

    <li class="treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> <span>My Profile</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu"> 
                        <li><a href="changePassword.php"><i class="fa fa-star"></i> My Profile</a></li>
                        <li><a href="changePassword.php?changePassword=yes"><i class="fa fa-edit"></i>Change Password</a></li>
                        <li><a href="message.php"><i class="fa fa-envelope"></i> Message</a></li>
                        <li><a href="logOut.php"><i class="fa fa-power-off"></i> Logout</a></li> 
                    </ul>
                </li> 


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span> Others </span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">   
                        <li>
                            <a href="calendar.php">
                                <i class="fa fa-calendar-check-o"></i> <span>Calendar </span> 
                            </a>
                        </li>
                        <li>
                            <a href="notices.php">
                                <i class="fa fa-tasks"></i> <span>Notice </span> 
                            </a>
                        </li>

                    </ul>
                </li>

            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


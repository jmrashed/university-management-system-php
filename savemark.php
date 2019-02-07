<?php

include 'connection.php';
if (isset($_POST['savemark'])) {
    $exam = $_POST['exam'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $count = $_POST['count'];
    $loop = 1;
    while ($loop <= $count) {
        $idstring = "id" . $loop;
        $markstring = "mark" . $loop;
        $id = $_POST[$idstring];
        $mark = $_POST[$markstring];

        $sql = "INSERT INTO mark (studentid, exam, class, subject, mark, datetime) 
                VALUES ( '$id', '$exam', '$class', '$subject', '$mark', now())";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {

            $flag = 1;
        } else {
            $flag = 0;
        }
        $loop++;
    }
    if ($flag == 1) {
        header('Location:results.php?Message=Mark has been saved.');
    } else {

        header('Location:results.php?Message=Mark has not been saved.');
    }
}
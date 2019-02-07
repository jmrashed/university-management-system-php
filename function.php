<?php

function get_ColamName($table, $col,$id){
     global $conn;
    $sql = "SELECT $col FROM $table where id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row[$col];
    }
}
function get_subjectName($id) {
    global $conn;
    $sql = "SELECT subjectname FROM subject where id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['subjectname'];
    }
}


function adminAccess() {

    include_once 'config.php';
    
}

function get_className($id) {
    global $conn;
    $sql = "SELECT classname FROM class where id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['classname'];
    }
}

function get_studentName($id) {
    global $conn;
    $sql = "SELECT name FROM student where id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name'];
    }
}

function get_adminName($id) {

    global $conn;
    $sql = "SELECT name FROM admin where id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["name"];
    }
}

function get_SystemName() {

    global $conn;
    $sql = "SELECT systemname FROM systm";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["systemname"];
    }
}

function get_RowNumber($table) {
    global $conn;
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    $rowNumber = $result->num_rows;
    return $rowNumber;
}

function get_SelectList($table, $value, $orderby, $rowname) {
    global $conn;
    $sql = "SELECT * FROM $table ORDER BY $orderby";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>

            <option value="<?= $row[$value]; ?>"><?= $row[$rowname]; ?></option>
            <?php
        }
    }
}

function get_SelectListbyRow($table, $value, $orderby, $rowname, $whereCol, $what) {
    global $conn;
    $sql = "SELECT * FROM $table where $whereCol='$what' ORDER BY '$orderby'";
    $result = $conn->query($sql);
    // echo $sql;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>

            <option value="<?= $row[$value]; ?>"><?= $row[$rowname]; ?></option>
            <?php
        }
    }
}

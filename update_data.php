<?php 
    include("config.php");

    $edit_id = $_POST['edit_id'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];

    $sql = "UPDATE tbl_user SET name='".$name."', sex='".$sex."' WHERE user_id='".$edit_id."'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "ok";
    } else {
        echo "not ok";
    }

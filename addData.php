<?php 
    include("config.php");

    $name = $_POST['name'];
    $sex = $_POST['sex'];

    $sql ="INSERT INTO tbl_user (name,sex) VALUES ('$name','$sex')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "ok";
    } else {
        echo "not ok";
    }
?>
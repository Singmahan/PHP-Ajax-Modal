<?php 
    include("config.php");

    $del_id = $_POST['del_id'];
    $sql = "DELETE FROM tbl_user WHERE user_id='".$del_id."'";
    $result = mysqli_query($con, $sql);
?>
<?php 
    $con = mysqli_connect("localhost","root","","crud_php_ajax");
    if(!$con){
        echo "Database error" .mysqli_error();
    }
?>
<?php
include("config.php");

if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $sql = "SELECT * FROM tbl_user WHERE user_id='$id'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['user_id'];
    }
}
?>
<input type="hidden" name="del_id" id="del_id" value="<?php echo $id; ?>">   
<p>Do you want to delete this record ? Not undo !</p>
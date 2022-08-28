<?php
include("config.php");

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];

    $sql = "SELECT * FROM tbl_user WHERE user_id='$id'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['user_id'];
        $name = $row['name'];
        $sex = $row['sex'];
    }
}
?>
<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $id; ?>">   
<div class="gorm-group">
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
</div>
<div class="gorm-group mt-2">
    <input type="text" class="form-control" name="sex" id="sex" value="<?php echo $sex; ?>">
</div>
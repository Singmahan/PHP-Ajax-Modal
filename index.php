<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Document</title>
</head>

<body>
    <!-- Start add Modal  -->


    <!-- Modal -->
    <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="gorm-group">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name">
                            <label id="lblName" style="color:red;"></label>
                        </div>
                        <div class="gorm-group mt-2">
                            <input type="text" class="form-control" id="sex" placeholder="Enter Sex">
                            <label id="lblSex" style="color:red;"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="save">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end add Modal  -->
    <!-- start edit modal  -->
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="POST" id="updateForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="info_update">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end edit modal  -->

    <!-- delete data modal  -->
    <div class="modal fade" id="delData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="POST" id="delForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="info_del">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="del">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- table  -->
    <div class="container mt-5">
        <h3 class="text-center">PHP Ajax Modal</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addData">
            + Add Data
        </button>

        <table class="table table-bordered mt-5" style="width: 50%;" align="center">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>User ID</th>
                    <th>User UserName</th>
                    <th>Sex</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- view data from database  -->
            <?php
            include("config.php");
            $sql = "SELECT * FROM tbl_user";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tbody>
                    <tr>
                        <td class="text-center"><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm edit_data" id="<?php echo $row['user_id']; ?>">Edit</button>
                            <button class="btn btn-danger btn-sm del_data" id="<?php echo $row['user_id']; ?>">Delete</button>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
            <!-- end view data  -->
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // save 
            $(document).on('click', '#save', function() {
                var name = $("#name").val();
                var sex = $("#sex").val();

                if (name == "") {
                    $("#lblName").html("Please input name !");
                } else if (sex == "") {
                    $("#lblSex").html("Please input sex !");
                } else {
                    $.ajax({
                        url: "addData.php",
                        method: "POST",
                        data: {
                            name: name,
                            sex: sex
                        },
                        success: function(data) {
                            // $("#addData").modal('hide');
                            // location.reload();
                            if (data == 'ok') {
                                Swal.fire(
                                    'เพิ่มข้อมูลสำเร็จ!',
                                    '',
                                    'success'
                                ).then(function() {
                                    window.location.href = "index.php";
                                })
                            } else {
                                Swal.fire(
                                    'เกิดข้อผิดพลาด!',
                                    'โปรดลองใหม่อีกครั้ง',
                                    'error'
                                )
                            }
                        }
                    });
                }
            });

            // update 
            $(document).on('click', '.edit_data', function() {
                var edit_id = $(this).attr('id');
                $.ajax({
                    url: "edit_data.php",
                    method: "POST",
                    data: {
                        edit_id: edit_id
                    },
                    success: function(data) {
                        $("#info_update").html(data);
                        $("#editData").modal('show');
                    }
                });
            });
            $(document).on('click', '#update', function() {
                $.ajax({
                    url: "update_data.php",
                    method: "POST",
                    data: $("#updateForm").serialize(),
                    success: function(data) {
                        // $("#editData").modal('hide');
                        // location.reload();
                        if (data == 'ok') {
                            Swal.fire(
                                'แก้ไขข้อมูลสำเร็จ!',
                                '',
                                'success'
                            ).then(function() {
                                window.location.href = "index.php";
                            })
                        } else {
                            Swal.fire(
                                'เกิดข้อผิดพลาด!',
                                'โปรดลองใหม่อีกครั้ง',
                                'error'
                            )
                        }
                    }
                });
            });

            // delete data 
            $(document).on('click', '.del_data', function() {
                var del_id = $(this).attr('id');
                $.ajax({
                    url: "del_data.php",
                    method: "POST",
                    data: {
                        del_id: del_id
                    },
                    success: function(data) {
                        $("#info_del").html(data);
                        $("#delData").modal('show');
                    }
                });
            });
            $(document).on('click', '#del', function() {
                $.ajax({
                    url: "delete_data.php",
                    method: "POST",
                    data: $("#delForm").serialize(),
                    success: function(data) {
                        $("#delData").modal('hide');
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khách hàng</title>
</head>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        margin-top: 20px;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        margin: auto;
    }

    th,
    td {
        padding: 5px;

    }

    input[type="text"] {
        width: 300px;
        padding: 5px;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 5px;
        background-color: chartreuse;
        border-radius: 5px;
    }
</style>

<body>
    <?php
    include_once('./config.php');
    if (isset($_POST['btnsend'])) {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $gt = $_POST['gt'] == 'Nam' ? 1 : 0;
        $dc = $_POST['dchi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];



        $sql = "INSERT INTO khach_hang (Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email)
        VALUES ('$id', '$ten', '$gt', '$dc', '$sdt', '$email')";
        $db = mysqli_query($con, $sql);

        if ($db) {
            $alert = "Thêm khách hàng mới thành công";
        } else {
            $alert = "";
        }

        if (isset($_POST['btnreset'])) {
            $id = $ten = $dc = $sdt = $email = '';
        }
    }

    mysqli_close($con);
    ?>

    <div class="container">
        <form action="./Insert.php" method="post">
            <table>
                <tr>
                    <th colspan="2">
                        <h3>THÊM KHÁCH HÀNG</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <a href="./CRUD.php">Quay về</a>
                    </th>
                </tr>
                <tr>
                    <td>Mã khách hàng</td>
                    <td><input type="text" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : "" ?>" required></td>
                </tr>
                <tr>
                    <td>Tên khách hàng</td>
                    <td><input type="text" name="ten" value="<?php echo isset($_POST['ten']) ? $_POST['ten'] : ""  ?>" required></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td style="display: flex; justify-content: space-around; align-items: center;">
                        <span><input type="radio" name="gt" value="Nam" checked> Nam</span>
                        <span><input type="radio" name="gt" value="Nữ"> Nữ</span>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="dchi" value="<?php echo isset($_POST['dchi']) ? $_POST['dchi'] : ""  ?>" required></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : ""  ?>" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""  ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsend" value="Thêm">
                        <input type="reset" name="btnreset" value="Xoá">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <?php
                        echo isset($alert) ? $alert : "";
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
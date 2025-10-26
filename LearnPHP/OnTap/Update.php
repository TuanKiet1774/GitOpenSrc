<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin khách hàng</title>
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
            padding: 5px 10px;
            background-color: chartreuse;
            border-radius: 5px;
            border: none;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            opacity: 0.8;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include_once('./config.php');

    $id = isset($_GET['MaKH']) ? $_GET['MaKH'] : "";
    $sql = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['btnupdate'])) {
        $ten = $_POST['ten'];
        $gt = $_POST['gt'] == 'Nam' ? 1 : 0;
        $dc = $_POST['dchi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];

        $update_sql = "
            UPDATE khach_hang
            SET Ten_khach_hang='$ten',
                Phai='$gt',
                Dia_chi='$dc',
                Dien_thoai='$sdt',
                Email='$email'
            WHERE Ma_khach_hang='$id'
        ";

        $update_db = mysqli_query($con, $update_sql);

        if ($update_db) {
            $alert = "Cập nhật thông tin khách hàng thành công!";
        } else {
            $alert = "Lỗi khi cập nhật dữ liệu!";
        }
    }

    mysqli_close($con);
    ?>

    <div class="container">
        <form action="" method="post">
            <table>
                <tr>
                    <th colspan="2">
                        <h3>SỬA THÔNG TIN KHÁCH HÀNG</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <a href="./CRUD.php">Quay về</a>
                    </th>
                </tr>
                <tr>
                    <td>Mã khách hàng</td>
                    <td>
                        <input type="text" name="id" value="<?php echo isset($row['Ma_khach_hang']) ? $row['Ma_khach_hang'] : ""; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tên khách hàng</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo isset($row['Ten_khach_hang']) ? $row['Ten_khach_hang'] : ""; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td style="display: flex; justify-content: space-around; align-items: center;">
                        <span>
                            <input type="radio" name="gt" value="Nam" <?php echo $row['Phai'] == 1 ? 'checked' : ''; ?>> Nam
                        </span>
                        <span>
                            <input type="radio" name="gt" value="Nữ" <?php echo $row['Phai'] == 0 ? 'checked' : ''; ?>> Nữ
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="dchi" value="<?php echo isset($row['Dia_chi']) ? $row['Dia_chi'] : ""; ?>" required></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="sdt" value="<?php echo isset($row['Dien_thoai']) ? $row['Dien_thoai'] : ""; ?>" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo isset($row['Email']) ? $row['Email'] : ""; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnupdate" value="Cập nhật">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <?php echo isset($alert) ? $alert : ""; ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
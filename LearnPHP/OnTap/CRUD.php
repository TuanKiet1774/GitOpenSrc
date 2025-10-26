<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert - Delete - Update</title>
</head>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
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

    tr:nth-child(odd) {
        background-color: #fbb487ff;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .btn {
        text-align: center;
        margin: 5px;
        padding: 5px;
        background-color: aquamarine;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        padding: 10px;
    }

    .btn-edit {
        background-color: aqua;
    }

    .btn-delete {
        background-color: red;
    }

    .page a {
        padding: 5px;
    }

    .page b {
        color: red;
    }

    .btnFind {
        padding: 5px;
        background-color: lightsalmon;
        border: none;
        border-radius: 10px;
    }
</style>

<body>
    <?php
    include_once('./config.php');

    $rowPerPage = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset  = ($page - 1) * $rowPerPage;

    if (isset($_GET['btnFind']) && $_GET['tenKH'] !== "") {
        $ten = $_GET['tenKH'];

        $sqlCount = "SELECT * FROM khach_hang
        WHERE Ten_khach_hang LIKE '%$ten%'";
        $dbCount = mysqli_query($con, $sqlCount);
        $count = mysqli_num_rows($dbCount);
        $maxPage = ceil($count / $rowPerPage);

        $sql = "SELECT * FROM khach_hang
        WHERE Ten_khach_hang LIKE '%$ten%'
        LIMIT $offset, $rowPerPage";
        $db = mysqli_query($con, $sql);
    } else {
        $sqlCount = "SELECT * FROM khach_hang";
        $dbCount = mysqli_query($con, $sqlCount);
        $count = mysqli_num_rows($dbCount);
        $maxPage = ceil($count / $rowPerPage);

        $sql = "SELECT * FROM khach_hang
        LIMIT $offset, $rowPerPage";
        $db = mysqli_query($con, $sql);
    }

    ?>

    <div class="container">
        <form action="./CRUD.php" method="get">
            <table>
                <tr style="background-color: white;">
                    <th colspan="3">
                        <h2>Thông tin khách hàng</h2>
                    </th>
                </tr>
                <tr style="background-color: white;">
                    <td>Nhập tên khách hàng</td>
                    <td><input type="text" name="tenKH" value="<?php echo isset($_GET['tenKH']) ? $_GET['tenKH'] : "" ?>"></td>
                    <td><input type="submit" name="btnFind" class="btnFind" value="Tìm Kiếm"></td>
                </tr>
            </table>
        </form>

        <table border="1">
            <tr>
                <th>Mã KH</th>
                <th>Tên KH</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Chức năng</th>
            </tr>
            <?php
            while ($col = mysqli_fetch_assoc($db)) {
                echo "<tr>";
                echo "<td>" . $col['Ma_khach_hang'] . "</td>";
                echo "<td>" . $col['Ten_khach_hang'] . "</td>";
                $gt = $col['Phai'] == 1 ? "👨" : "👩";
                echo "<td style = 'text-align: center'>" . $gt . "</td>";
                echo "<td>" . $col['Dia_chi'] . "</td>";
                echo "<td>0" . $col['Dien_thoai'] . "</td>";
                echo "<td>" . $col['Email'] . "</td>";
                echo "<td class = 'btn-container'>";
                echo "<div class='btn btn-edit'><a href='./Update.php?MaKH=" . $col['Ma_khach_hang'] . "'>Sửa KH</a></div>";
                echo "<div class='btn btn-delete'><a href='./Select.php'>Xoá KH</a></div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="7" align="center" class="page">
                    <?php
                    if ($page > 1) {
                        echo "<a href =" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "/>Trước</a>";
                    }

                    for ($i = 1; $i <= $maxPage; $i++) {
                        if ($page == $i) {
                            echo "<b>$i</b>";
                        } else {
                            echo "<a href =" . $_SERVER['PHP_SELF'] . "?page=$i/>$i</a>";
                        }
                    }

                    if ($page < $maxPage) {
                        echo "<a href =" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "/>Sau</a>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <div class="btn" style="width: fit-content;"><a href="./Insert.php">Thêm KH</a></div>
                </td>
            </tr>

        </table>
    </div>
</body>

</html>
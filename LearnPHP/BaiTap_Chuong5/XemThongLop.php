<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin lớp</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        background: linear-gradient(to right, #6DB6F1, #9375D8);
    }

    .container {
        width: fit-content;
        background-color: #ffffffff;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    input[type=text],
    input[type=password] {
        width: 500px;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 10px;
    }

    input[type=submit],
    input[type=reset] {
        width: 30%;
        padding-block: 5px;
        padding-inline: 10px;
        background-color: #fcff9f;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        color: black;
    }

    table {
        border-collapse: collapse;
    }

    table tr td,
    th {
        padding: 5px;
        border-color: black;
    }

    th {
        color: red;
    }

    tr:nth-child(even) {
        background-color: #fee0c1;
    }

    .ptrang {
        margin-top: 10px;
        color: black;
    }

    .ptrang a {
        text-decoration: none;
        padding: 5px;

    }
</style>
<?php
include_once('./config/db_connect.php');

$rowPerPage = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $rowPerPage;
$sqlCount = "SELECT * FROM thongtinsv sv INNER JOIN thongtinlop lp WHERE sv.MaLop = lp.id";
$dbCount = mysqli_query($conn, $sqlCount);
$count = mysqli_num_rows($dbCount);
$maxPage = ceil($count / $rowPerPage);

$sql = "SELECT sv.Ho, sv.Ten, sv.DiaChi, lp.TenLop, lp.CVHT 
        FROM thongtinsv sv INNER JOIN thongtinlop lp 
        WHERE sv.MaLop = lp.id
        LIMIT $offset, $rowPerPage";
$result = mysqli_query($conn, "$sql");
?>

<body>
    <div class="container">
        <center>
            <h2>THÔNG TIN Lớp</h2>
        </center>
        <a href="./NhapThongTin.php">Quay lại trang trước</a>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Họ sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Địa chỉ</th>
                <th>Tên lớp</th>
                <th>Cố vấn học tập</th>
            </tr>
            <?php
            $i = $offset;
            while ($col = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $i + 1 . "</td>";
                echo "<td>" . $col['Ho'] . "</td>";
                echo "<td>" . $col['Ten'] . " </td>";
                echo "<td>" . $col['DiaChi'] . "</td>";
                echo "<td>" . $col['TenLop'] . "</td>";
                echo "<td>" . $col['CVHT'] . "</td>";
                echo "</tr>";
                $i++;
            }

            mysqli_close($conn);
            ?>
        </table>
        <center class="ptrang">
            <?php
            if ($page > 1) {
                echo "<a href =" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "><<</a>";
            }
            for ($i = 1; $i <= $maxPage; $i++) {
                if ($i == $page) {
                    echo "<b>$i</b>";
                } else {
                    echo "<a href =" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> $i </a>";
                }
            }

            if ($page < $maxPage) {
                echo "<a href =" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . ">>></a>";
            }
            ?>
        </center>
    </div>
</body>

</html>
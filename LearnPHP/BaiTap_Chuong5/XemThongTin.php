<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin sinh viên</title>
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
</style>
<?php
include_once('./config/db_connect.php');

$sql = "SELECT * FROM thongtinsv";
$result = mysqli_query($conn, "$sql");
$n = mysqli_num_rows($result);
$m = mysqli_num_fields($result);

?>

<body>
    <div class="container">
        <center>
            <h2>THÔNG TIN SINH VIÊN</h2>
        </center>
        <a href="./NhapThongTin.php">Quay lại trang trước</a>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Họ sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Địa chỉ</th>
                <th>Mã lớp</th>
            </tr>
            <?php
            for ($i = 0; $i < $n; $i++) {
                $color = ($i % 2 == 0) ? "#fee0c1" : "white";
                echo "<tr>";
                $col = mysqli_fetch_array($result);
                echo "<td>" . $i . "</td>";
                echo "<td>" . $col['1'] . "</td>";
                echo "<td>" . $col['2'] . " </td>";
                echo "<td>" . $col['3'] . "</td>";
                echo "<td>" . $col['4'] . "</td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>

</html>
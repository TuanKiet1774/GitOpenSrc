<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
    }

    table {
        border-collapse: collapse;
        margin: auto;
        font-size: 15px;
    }

    td,
    th {
        padding: 5px;
    }

    tr:nth-child(odd) {
        background-color: blanchedalmond;
    }
</style>

<body>
    <?php
    include_once('./config.php');

    $sql = 'SELECT * FROM khach_hang';
    $db = mysqli_query($con, $sql);
    $n = mysqli_num_rows($db);

    ?>
    <div class="container">
        <center>
            <h2>Thông tin bảng sữa</h2>
        </center>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Mã KH</th>
                <th>Tên KH</th>
                <th>Phai</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            <?php
            $i = 1;
            while ($col = mysqli_fetch_array($db)) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $col['Ma_khach_hang'] . "</td>";
                echo "<td>" . $col['Ten_khach_hang'] . "</td>";
                $gt = $col['Phai'] == 1 ? "Nam" : "Nữ";
                echo "<td>" . $gt . "</td>";
                echo "<td>" . $col['Dia_chi'] . "</td>";
                echo "<td>0" . $col['Dien_thoai'] . "</td>";
                echo "<td>" . $col['Email'] . "</td>";
                $i++;
                echo "</tr>";
            }

            mysqli_close($con);
            ?>
        </table>
    </div>
</body>

</html>
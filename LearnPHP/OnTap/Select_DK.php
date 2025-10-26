<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select nhiều bảng và điều kiện</title>
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
        margin: auto;
        font-size: 15px;
        border-collapse: collapse;
    }

    tr:nth-child(even) {
        background-color: burlywood;
    }

    td,
    th {
        padding: 5px;
    }
</style>

<body>
    <?php
    include_once('./config.php');

    $sql = 'SELECT s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia 
    FROM sua s 
    INNER JOIN hang_sua hs 
    ON s.Ma_hang_sua = hs.Ma_hang_sua
    INNER JOIN loai_sua ls 
    ON s.Ma_loai_sua = ls.Ma_loai_sua 
    WHERE ls.Ten_loai = "Sữa đặc"';

    $db = mysqli_query($con, $sql);
    $n = mysqli_num_rows($db);
    ?>
    <div class="container">
        <center>
            <h2>Thông tin chi tiết của các loại sữa đặc</h2>
        </center>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên Sữa</th>
                <th>Hãng sữa</th>
                <th>Tên loại</th>
                <th>Trọng lượng</th>
                <th>Đơn giá</th>
            </tr>
            <?php
            $i = 1;
            while ($col = mysqli_fetch_assoc($db)) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>" . $col['Ten_sua'] . "</td>";
                echo "<td>" . $col['Ten_hang_sua'] . "</td>";
                echo "<td>" . $col['Ten_loai'] . "</td>";
                echo "<td>" . $col['Trong_luong'] . "</td>";
                echo "<td>" . $col['Don_gia'] . "</td>";
                echo "</tr>";
                $i++;
            }
            mysqli_close($con);
            ?>

        </table>
    </div>
</body>

</html>
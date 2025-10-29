<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu 1c - Quản lý bán sữa</title>
</head>

<style>
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

    tr:nth-child(even) {
        background-color: coral;
    }

    tr:nth-child(odd) {
        background-color: blanchedalmond;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <?php
    include_once('./config.php');

    $rowPerPage = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if ($page < 1) $page = 1;

    $offset = ($page - 1) * $rowPerPage;
    $sqlCount = "SELECT * 
                FROM sua s INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
                WHERE Trong_luong < 400";
    $dbCount = mysqli_query($con, $sqlCount);
    $count = mysqli_num_rows($dbCount);
    $maxPage = ceil($count / $rowPerPage);

    $sql = "SELECT s.Ten_sua, s.Don_gia, s.Trong_luong, hs.Ten_hang_sua 
            FROM sua s INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
            WHERE Trong_luong < 400 
            LIMIT $offset, $rowPerPage";
    $db = mysqli_query($con, $sql);
    ?>

    <div class="container">
        <table border="1">
            <tr>
                <th colspan="5">THÔNG TIN HÃNG SỮA CÓ TRỌNG LƯƠNG NHỎ HƠN 400Gr </th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Tên sữa</th>
                <th>Hãng sữa</th>
                <th>Đơn giá</th>
                <th>Trọng lượng</th>
            </tr>
            <?php
            $i = $offset;
            while ($col = mysqli_fetch_assoc($db)) {
                echo "<tr>";
                echo "<td style = 'text-align: center'><b>" . $i + 1 . "</b></td>";
                echo "<td>" . $col['Ten_sua'] . "</td>";
                echo "<td>" . $col['Ten_hang_sua'] . "</td>";
                echo "<td>" . $col['Don_gia'] . " VNĐ</td>";
                echo "<td>" . $col['Trong_luong'] . " Gr</td>";
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
        <center style="margin-top: 10px;">
            <?php
            if ($page > 1) {
                echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "> << </a>";
            }

            for ($i = 1; $i <= $maxPage; $i++) {
                if ($page == $i) {
                    echo "<b style = 'color: red'> $i </b>";
                } else {
                    echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=$i> $i </a>";
                }
            }

            if ($page < $maxPage) {
                echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "> >> </a>";
            }
            ?>
        </center>
    </div>
</body>

</html>
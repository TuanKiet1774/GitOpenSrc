<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.7 Kết quả</title>
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

    table {
        border-collapse: collapse;
        margin: auto;
    }

    table tr td,
    th {
        /* width: 300px; */
        padding: 5px;
        border-color: black;
    }

    tr th {
        background-color: #fee0c1;
    }

    .pagination a {
        text-decoration: none;
        color: blue;
        padding: 5px;
    }

    .pagination b {
        color: red;
        padding: 5px;
    }

    img {
        width: 150px;
    }
</style>

<body>
    <div class="container">
        <?php
        include_once("../config/db_connect.php");

        $ma_sua = isset($_GET['Ma_sua']) ? $_GET['Ma_sua'] : '';

        $sql = "SELECT s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia, s.Hinh, s.TP_Dinh_Duong, s.Loi_ich
            FROM sua s 
            INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
            INNER JOIN loai_sua ls ON ls.Ma_loai_sua = s.Ma_loai_sua
            WHERE s.Ma_sua = '$ma_sua'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <table border="1">
            <?php
            $path = '../Hinh_sua/' . $row['Hinh'];

            echo "<tr>";
            echo "<th colspan = '2' align='center' style='color: orange'>" . $row['Ten_sua'] . " - " . $row['Ten_hang_sua'] . "</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td width ='100px' align='center'><img src='$path'></td>";
            echo "<td width ='500px'><i><b>Thành phần dinh dưỡng: </b><br></i>" . $row['TP_Dinh_Duong'] . " <br> <i><b>Lợi ích: </b></i><br>" . $row['Loi_ich'] . "<br><br><br><span style='float: right;'><i><b>Trọng lượng:</b></i>" . $row['Trong_luong'] . " - <i><b>Đơn giá:</b></i>" . $row['Don_gia'] . "</span></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='right'><a href='./Bai2_7.php'>Quay về</a></td>";
            echo "<td></td>";
            echo "</tr>";
            ?>
        </table>
    </div>
</body>

</html>
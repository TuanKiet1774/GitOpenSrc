<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 2.8 List chi tiết có phân trang</title>
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

  table tr td {
    padding-block: 15px;
  }

  th {
    padding: 5px;
    color: red;
  }

  tr th {
    background-color: #fee0c1;
  }

  .pagination a {
    /* text-decoration: none; */
    color: red;
    padding: 5px;
  }

  .pagination b {
    /* color: red; */
    padding: 5px;
  }

  img {
    padding: 5px;
    width: 90px;
  }

  .col-img {
    width: fit-content;
  }

  .col-info {
    width: 500px;
  }
</style>

<body>
  <div class="container">
    <?php
    include_once("../config/db_connect.php");

    // Cấu hình phân trang
    $rowsPerPage = 2;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $rowsPerPage;

    // Lấy tổng số dòng
    $sqlCount = "SELECT * 
                FROM sua s 
                INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua";
    $resultCount = mysqli_query($conn, $sqlCount);
    $rowCount = mysqli_num_rows($resultCount);
    $maxPage = ceil($rowCount / $rowsPerPage);

    // Lấy dữ liệu cho trang hiện tại
    $sql = "SELECT s.Ten_sua, hs.Ten_hang_sua, s.Trong_luong, s.Don_gia, s.Hinh, s.TP_Dinh_Duong, s.Loi_ich
            FROM sua s 
            INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
            LIMIT $offset, $rowsPerPage;";
    $result = mysqli_query($conn, $sql);
    ?>

    <center>
      <h2 style="color: red; padding: 5px;">THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h2>
    </center>

    <table border="1">
      <?php
      while ($col = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th colspan = '2'><b>" . $col['Ten_sua'] . " - " . $col['Ten_hang_sua'] . "</b></th>";
        echo "</tr>";
        $path = '../Hinh_sua/' . $col['Hinh'];
        echo "<tr>";
        echo "<td class = 'col-img'><img src = '$path'></td>";
        echo "<td class = 'col-info'>";
        echo "<i><b>Thành phần dinh dưỡng: </b></i><br>" . $col['TP_Dinh_Duong'] . "<br>";
        echo "<i><b>Lợi ích: </b></i><br>" . $col['Loi_ich'] . "<br>";
        echo "<i><b>Trọng lượng: </b></i><span style ='color: red'>" . $col['Trong_luong'] . " gr</span> - <i><b>Đơn giá: </b></i><span style ='color: red'>" . $col['Don_gia'] . " VNĐ</span>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
    </table>

    <div class="pagination" style="text-align:center; margin-top:10px;">
      <?php
      if ($page > 1) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "><<</a> ";
      }

      for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $page)
          echo "<b>$i</b> ";
        else
          echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$i>$i</a> ";
      }

      if ($page < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . ">>></a>";
      }

      mysqli_close($conn);
      ?>
    </div>

  </div>
</body>

</html>
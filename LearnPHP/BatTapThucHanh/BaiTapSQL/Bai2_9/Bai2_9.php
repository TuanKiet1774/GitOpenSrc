<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 2.9 Tìm kiếm đơn giản</title>
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
    margin: 10px;
    width: 700px;
    background-color: #ffffffff;
    align-items: center;
  }

  table {
    padding: 10px;
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
    color: red;
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

  input[type=text],
  input[type=password] {
    border-radius: 5px;
    border: 1px solid #ccc;
    padding-left: 10px;
  }

  input[type=submit],
  input[type=reset] {
    padding: 2px;
    font-size: 10px;
    background-color: #fecccd;
    cursor: pointer;
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

    if (isset($_GET['search']) && $_GET['search'] !== "") {
      $search = $_GET['search'];

      // Đếm tổng số dòng bằng num_rows
      $sqlCount = "SELECT s.Ten_sua
               FROM sua s
               INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
               WHERE s.Ten_sua LIKE '%$search%'";
      $resultCount = mysqli_query($conn, $sqlCount);
      $rowCount = mysqli_num_rows($resultCount);
      $maxPage = ceil($rowCount / $rowsPerPage);

      // Lấy dữ liệu trang hiện tại
      $sql = "SELECT s.Ten_sua, hs.Ten_hang_sua, s.Trong_luong, s.Don_gia, s.Hinh, s.TP_Dinh_Duong, s.Loi_ich
          FROM sua s
          INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
          WHERE s.Ten_sua LIKE '%$search%'
          LIMIT $offset, $rowsPerPage";
      $result = mysqli_query($conn, $sql);
    } else {
      // Đếm tổng số dòng bằng num_rows
      $sqlCount = "SELECT s.Ten_sua
               FROM sua s
               INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua";
      $resultCount = mysqli_query($conn, $sqlCount);
      $rowCount = mysqli_num_rows($resultCount);
      $maxPage = ceil($rowCount / $rowsPerPage);

      // Lấy dữ liệu trang hiện tại
      $sql = "SELECT s.Ten_sua, hs.Ten_hang_sua, s.Trong_luong, s.Don_gia, s.Hinh, s.TP_Dinh_Duong, s.Loi_ich
          FROM sua s
          INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
          LIMIT $offset, $rowsPerPage";
      $result = mysqli_query($conn, $sql);
    }
    ?>


    <center width="100%" style="background-color: #fecccd;">
      <form action="./Bai2_9.php" method="get">
        <h2 style="color: red;">TÌM KIẾM THÔNG TIN SỮA</h2>
        <div>
          <b style="color: red;">Tên sữa: </b>
          <input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" />
          <input type="submit" name="btn" value="Tìm kiếm" />
        </div>
      </form>
    </center>
    <center>
      <p name="alert">
        <?php
        if (!empty($_GET['search'])) {
          echo "<b>Có " . $rowCount . " sản phẩm tìm thấy</b>";
        } else echo "";
        ?>
      </p>
    </center>

    <table border="1" style="margin-top: 20px;">
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

    <div class="pagination" style="text-align:center; margin-block:10px;">
      <?php
      $searchParam = isset($_GET['search']) ? "&search=" . urlencode($_GET['search']) : "";

      if ($page > 1) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "$searchParam><<</a> ";
      }

      for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $page)
          echo "<b>$i</b> ";
        else
          echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$i$searchParam>$i</a> ";
      }

      if ($page < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "$searchParam>>></a>";
      }

      mysqli_close($conn);
      ?>
    </div>

  </div>
</body>

</html>
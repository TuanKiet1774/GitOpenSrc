<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 2.4 Lưới phân trang</title>
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

  .pagination a {
    text-decoration: none;
    color: blue;
    padding: 5px;
  }

  .pagination b {
    color: red;
    padding: 5px;
  }
</style>

<body>
  <div class="container">
    <center>
      <h3>THÔNG TIN SỮA</h3>
    </center>

    <?php
    include_once("../config/db_connect.php");

    // Cấu hình phân trang
    $rowsPerPage = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $rowsPerPage;

    // Lấy tổng số dòng
    $sqlCount = "SELECT * 
                FROM sua s 
                INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
                INNER JOIN loai_sua ls ON ls.Ma_loai_sua = s.Ma_loai_sua;";
    $resultCount = mysqli_query($conn, $sqlCount);
    $rowCount = mysqli_num_rows($resultCount);
    $maxPage = ceil($rowCount / $rowsPerPage);

    // Lấy dữ liệu cho trang hiện tại
    $sql = "SELECT s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia 
            FROM sua s 
            INNER JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
            INNER JOIN loai_sua ls ON ls.Ma_loai_sua = s.Ma_loai_sua
            LIMIT $offset, $rowsPerPage;";
    $result = mysqli_query($conn, $sql);
    ?>

    <table border="1">
      <tr>
        <th>Số TT</th>
        <th>Tên Sữa</th>
        <th>Hãng sữa</th>
        <th>Loại sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
      </tr>

      <?php
      $stt = $offset + 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$stt}</td>";
        echo "<td>{$row['Ten_sua']}</td>";
        echo "<td>{$row['Ten_hang_sua']}</td>";
        echo "<td>{$row['Ten_loai']}</td>";
        echo "<td>{$row['Trong_luong']}</td>";
        echo "<td>{$row['Don_gia']}</td>";
        echo "</tr>";
        $stt++;
      }
      ?>
    </table>

    <div class="pagination" style="text-align:center; margin-top:10px;">
      <?php
      if ($page > 1) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . ">Back</a> ";
      }

      for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $page)
          echo "<b>[$i]</b> ";
        else
          echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=$i>[$i]</a> ";
      }

      if ($page < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . ">Next</a>";
      }

      mysqli_close($conn);
      ?>
    </div>

  </div>
</body>

</html>

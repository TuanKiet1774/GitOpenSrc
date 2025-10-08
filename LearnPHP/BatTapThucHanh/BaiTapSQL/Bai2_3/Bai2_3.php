<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 2.3 Lưới định dạng</title>
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
</style>
<?php
//Kết nối với DB (Hàm thủ tục)
require_once __DIR__ . '/../config/db_connect.php';

$sql = "SELECT * FROM khach_hang";
$result = mysqli_query($conn, "$sql");
$n = mysqli_num_rows($result);

// echo "Số hàng của hang_sua: " . $n;
?>

<body>
  <div class="container">
    <center>
      <h3>THÔNG TIN KHÁCH HÀNG</h3>
    </center>
    <table border="1">
      <tr>
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
      </tr>
      <?php
      for ($i = 0; $i < $n; $i++) {
        $color = ($i % 2 == 0) ? "#fee0c1" : "white";
        echo "<tr>";
        $col = mysqli_fetch_array($result);
        echo "<td style = 'background-color: $color;' >" . $col['0'] . "</td>";
        echo "<td style = 'background-color: $color;'>" . $col['1'] . "</td>";
        $gt = $col[2] == 1 ? "♂️" : "♀️";
        echo "<td style = 'background-color: $color; text-align: center'> $gt </td>";
        echo "<td style = 'background-color: $color;'>" . $col['3'] . "</td>";
        echo "<td style = 'background-color: $color;'>" . $col['4'] . "</td>";
        echo "<td style = 'background-color: $color;'>" . $col['5'] . "</td>";
        echo "</tr>";
      }

      mysqli_free_result($result);
      mysqli_close($conn);
      ?>
    </table>
  </div>
</body>

</html>
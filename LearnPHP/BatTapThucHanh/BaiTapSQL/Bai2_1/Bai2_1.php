<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 2.1 Hiển thị lưới</title>
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

$sql = "SELECT * FROM hang_sua";
$result = mysqli_query($conn, "$sql");
$n = mysqli_num_rows($result); //Hàng
$m = mysqli_num_fields($result); //Cột

// echo "Số hàng của hang_sua: " . $n;
?>

<body>
  <div class="container">
    <center>
      <h3>THÔNG TIN HÀNG SỮA</h3>
    </center>
    <table border="1">
      <tr>
        <th>Mã hàng sữa</th>
        <th>Tên hàng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
      </tr>
      <?php
      //Dùng mysqli_fetch_row
      // for ($i = 0; $i < $n; $i++) {
      //   $color = ($i % 2 == 0) ? "#fee0c1" : "white";
      //   echo "<tr>";
      //   $col = mysqli_fetch_row($result);
      //   for ($j = 0; $j < $m; $j++) {
      //     echo "<td style = 'background-color: $color'>" . $col[$j] . "</td>";
      //   }
      //   echo "</tr>";
      // }

      //Dùng mysqli_fetch_array
      for ($i = 0; $i < $n; $i++) {
        $color = ($i % 2 == 0) ? "#fee0c1" : "white";
        echo "<tr>";
        $col = mysqli_fetch_array($result);
        echo "<td style = 'background-color: $color'>" . $col[0] . "</td>";
        echo "<td style = 'background-color: $color'>" . $col[1] . "</td>";
        echo "<td style = 'background-color: $color'>" . $col[2] . "</td>";
        echo "<td style = 'background-color: $color'>" . $col[3] . "</td>";
        echo "<td style = 'background-color: $color'>" . $col[4] . "</td>";
        echo "</tr>";
      }

      mysqli_free_result($result);
      mysqli_close($conn);
      ?>
    </table>
  </div>
</body>

</html>
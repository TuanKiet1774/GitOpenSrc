<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhập thông tin sinh viên</title>
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
    background-color: #00ffd0ff;
    padding: 10px;
    border-radius: 15px;
    align-items: center;
  }

  input[type=text],
  input[type=password] {
    width: 350px;
    height: 30px;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding-left: 10px;
  }

  input[type=submit],
  input[type=reset] {
    width: fit-content;
    padding-block: 5px;
    padding-inline: 10px;
    background-color: #ff9500ff;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    color: black;
  }

  select {
    width: 100%;
    padding-block: 5px;
    padding-inline: 10px;
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

  .btnresult {
    text-decoration: none;
    padding: 5px;
    background-color: #ff9500ff;
    color: black;
    border-radius: 5px;
  }
</style>
<?php
include_once('./config/db_connect.php');

$alert = "";
$ho = $ten = $diaChi = $lop = "";

if (isset($_POST['btnSend'])) {
  $ten = trim($_POST['ten']);
  $ho = trim($_POST['ho']);
  $diaChi = trim($_POST['diaChi']);
  $lop = $_POST['lop'];

  if (empty($ten) || empty($ho) || empty($diaChi) || empty($lop)) {
    $alert = "Thông tin không được để trống!";
  } else {
    $sql = "INSERT INTO ThongTinSV (Ho, Ten, DiaChi, MaLop) VALUES ('$ho', '$ten', '$diaChi', '$lop')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      $alert = "Thêm thông tin sinh viên thành công!";
    } else {
      $alert = "Thêm thông tin sinh viên thất bại!";
    }
  }
}

if (isset($_POST['btnDelete'])) {
  $ho = $ten = $diaChi = "";
  $lop = "";
}

mysqli_close($conn);
?>


<body>
  <div class="container">
    <center>
      <h2>Nhập Thông Tin Sinh Viên</h2>
    </center>
    <form action="./NhapThongTin.php" method="post">
      <table>
        <tr>
          <td>Họ sinh viên: </td>
          <td><input type="text" name="ho" value="<?php echo isset($_POST["ho"]) ? $_POST["ho"] : " " ?>" required></td>
        </tr>
        <tr>
          <td>Tên sinh viên: </td>
          <td><input type="text" name="ten" value="<?php echo isset($_POST["ten"]) ? $_POST["ten"] : " " ?>" required></td>
        </tr>

        <tr>
          <td>Địa chỉ: </td>
          <td><input type="text" name="diaChi" value="<?php echo isset($_POST["diaChi"]) ? $_POST["diaChi"] : " " ?>" required></td>
        </tr>
        <tr>
          <td>Lớp: </td>
          <td>
            <select name="lop">
              <option value="641" <?php echo isset($lop) && $lop == "641" ? "selected" : ""; ?>>64.CNTT-1</option>
              <option value="642" <?php echo isset($lop) && $lop == "642" ? "selected" : ""; ?>>64.CNTT-2</option>
              <option value="643" <?php echo isset($lop) && $lop == "643" ? "selected" : ""; ?>>64.CNTT-3</option>
              <option value="644" <?php echo isset($lop) && $lop == "644" ? "selected" : ""; ?>>64.CNTT-4</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btnSend" value="Gửi">
            <input type="submit" name="btnDelete" value="Xoá">
            <!-- <input type="submit" value="Xem kết quả 1" formaction="./XemThongTin.php"> -->
            <!-- <input type="submit" value="Xem kết quả 2" formaction="./XemThongLop.php"> -->
            <a href="./XemThongTin.php" class="btnresult">Xem kết quả 1</a>
            <a href="./XemThongLop.php" class="btnresult">Xem kết quả 2</a>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center" style="color: red;">
            <span>
              <?php
              echo isset($alert) ? $alert : "";
              ?>
            </span>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi đại học</title>
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
        background-color: #d3007bff;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    form {
        background-color: white;
    }

    input[type=text],
    input[type=password] {
        width: 200px;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 10px;
    }

    input[type=submit],
    input[type=reset] {
        width: 35%;
        padding-block: 5px;
        padding-inline: 10px;
        background-color: #43d841ff;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    table tr td {
        padding: 5px;
    }
</style>
<?php
if (isset($_POST["btn"])) {
    $toan = $_POST["Toan"];
    $ly = $_POST["Ly"];
    $hoa = $_POST["Hoa"];
    $diemChuan = $_POST["diemChuan"];
    $tongDiem = $_POST["tongDiem"];
    $ketQua = $_POST["ketQua"];

    if (is_numeric($toan) and is_numeric($ly) and is_numeric($hoa)) {
        $tongDiem = $hoa + $ly + $toan;
        if ($tongDiem >= $diemChuan and $toan > 0 and $ly > 0 and $hoa > 0 and $toan <= 10 and $ly <= 10 and $hoa <= 10) {
            $ketQua = "Đậu";
        } else {
            $ketQua = "rớt";
        }
    } else {
        $ketQua = $tongDiem = "Thông số không hợp lệ";
    }
}
?>

<body>
    <div class="container">
        <center style="color: white;">
            <h3>KẾT QUẢ THI ĐẠI HỌC</h3>
        </center>
        <form action="BaiTap4.php" method="post">
            <table>
                <tr>
                    <td>Toán: </td>
                    <td><input type="text" name="Toan" value="<?php echo isset($_POST["Toan"]) ? $_POST["Toan"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Lý: </td>
                    <td><input type="text" name="Ly" value="<?php echo isset($_POST["Ly"]) ? $_POST["Ly"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Hoá: </td>
                    <td><input type="text" name="Hoa" value="<?php echo isset($_POST["Hoa"]) ? $_POST["Hoa"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Điểm chuẩn: </td>
                    <td><input type="text" name="diemChuan" value="<?php echo isset($_POST["diemChuan"]) ? $_POST["diemChuan"] : "20"; ?>" style="color: red;"></td>
                </tr>
                <tr>
                    <td>Tổng điểm: </td>
                    <td><input type="text" name="tongDiem" readonly value="<?php echo isset($tongDiem) ? $tongDiem : " "; ?>" style="background-color: #f1f1f1ff;"></td>
                </tr>
                <tr>
                    <td>Kết quả thi: </td>
                    <td><input type="text" name="ketQua" readonly value="<?php echo isset($ketQua) ? $ketQua : " "; ?>" style="background-color: #f1f1f1ff;"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Xem kết quả"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
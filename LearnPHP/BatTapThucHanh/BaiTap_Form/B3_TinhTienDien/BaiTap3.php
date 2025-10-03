<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền điện</title>
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
        background-color: #a200d3ff;
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
        width: 30%;
        padding-block: 5px;
        padding-inline: 10px;
        background-color: #e96565ff;
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
    $old = $_POST["oldNum"];
    $new = $_POST["newNum"];
    $pr = $_POST["price"];
    $money = $_POST["money"];

    if (is_numeric($new) and is_numeric($old) and $old > 0 and $new > 0) {
        $money = ($new - $old) * $pr;
    } else {
        $money = "Thông số không hợp lệ";
    }
}
?>

<body>
    <div class="container">
        <center style="color: white;">
            <h3>THANH TOÁN TIỀN ĐIỆN</h3>
        </center>
        <form action="BaiTap3.php" method="post">
            <table>
                <tr>
                    <td>Tên chủ hộ: </td>
                    <td><input type="text" name="name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ: </td>
                    <td><input type="text" name="oldNum" value="<?php echo isset($_POST["oldNum"]) ? $_POST["oldNum"] : " "; ?>"> (Kw)</td>
                </tr>
                <tr>
                    <td>Chỉ số mới: </td>
                    <td><input type="text" name="newNum" value="<?php echo isset($_POST["newNum"]) ? $_POST["newNum"] : " "; ?>"> (Kw)</td>
                </tr>
                <tr>
                    <td>Đơn giá: </td>
                    <td><input type="text" name="price" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : "2000"; ?>"> (VNĐ)</td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán: </td>
                    <td><input type="text" name="money" readonly value="<?php echo isset($money) ? $money : " "; ?>" style="background-color: #ccc;"> (VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Tính"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
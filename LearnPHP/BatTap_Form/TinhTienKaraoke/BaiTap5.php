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
        background-color: #007c83ff;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    form {
        background-color: white;
    }

    input[type=text],
    input[type=password] {
        width: 300px;
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
    $start = $_POST["start"];
    $end = $_POST["end"];
    $money = $_POST["money"];

    if (is_numeric($start) and is_numeric($end)) {
        if ($end > $start) {
            if ($end >= 10 and $end < 17 and $start >= 10 and $start < 17) {
                $money = ($end - $start) * 20000;
            } else if ($end >= 17 and $end < 24 and $start >= 17 and $start < 24) {
                $money = ($end - $start) * 45000;
            } else {
                $money = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
            }
        } else {
            $money = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
        }
    } else {
        $money = "Hãy nhập thông tin";
    }
}
?>

<body>
    <div class="container">
        <center style="color: white;">
            <h3>TÍNH TIỀN KARAOKE</h3>
        </center>
        <form action="BaiTap5.php" method="post">
            <table>
                <tr>
                    <td>Giờ bắt đầu: </td>
                    <td><input type="text" name="start" value="<?php echo isset($_POST["start"]) ? $_POST["start"] : " "; ?>"> (h)</td>
                </tr>
                <tr>
                    <td>Giờ kết thúc: </td>
                    <td><input type="text" name="end" value="<?php echo isset($_POST["end"]) ? $_POST["end"] : " "; ?>"> (h)</td>
                </tr>
                <tr>
                    <td>Thanh toán: </td>
                    <td><input type="text" name="money" readonly value="<?php echo isset($money) ? $money : " "; ?>" style="background-color: #f1f1f1ff;"> (VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Tính tiền"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
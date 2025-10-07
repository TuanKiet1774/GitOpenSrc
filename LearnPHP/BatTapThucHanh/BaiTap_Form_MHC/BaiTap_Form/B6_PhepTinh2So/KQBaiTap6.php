<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính trên 2 số</title>
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
        background-color: #002583ff;
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
        background-color: #ffbb00ff;
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
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $cal = $_POST["cal"];

    function cong($a, $b)
    {
        return $a + $b;
    }

    function tru($a, $b)
    {
        return $a - $b;
    }

    function nhan($a, $b)
    {
        return $a * $b;
    }

    function chia($a, $b)
    {
        if ($b != 0) {
            return $a / $b;
        } else {
            return "Không thể chia cho 0";
        }
    }

    if (filter_var($num1, FILTER_VALIDATE_INT) && filter_var($num2, FILTER_VALIDATE_INT)) {
        switch ($cal) {
            case "Cộng":
                $result = cong($num1, $num2);
                break;
            case "Trừ":
                $result =  tru($num1, $num2);
                break;
            case "Nhân":
                $result =  nhan($num1, $num2);
                break;
            case "Chia":
                $result =  round(chia($num1, $num2), 2);
                break;
            default:
                $result = "Số hoặc phép tính không hợp lệ";
        }
    } else {
        $result = "Số không phải là số nguyên ";
    }
}
?>

<body>
    <div class="container">
        <center style="color: white;">
            <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
        </center>
        <form action="KQBaiTap6.php" method="post">
            <table>
                <tr style="color: red;">
                    <td>Chọn phép tính: </td>
                    <td><?php echo isset($cal) ? $cal : " "; ?></td>
                </tr>
                <tr>
                    <td>Số thứ nhât: </td>
                    <td><input type="text" name="num1" readonly value="<?php echo isset($_POST["num1"]) ? $_POST["num1"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Số thứ 2: </td>
                    <td><input type="text" name="num2" readonly value="<?php echo isset($_POST["num2"]) ? $_POST["num2"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Kết quả: </td>
                    <td><input type="text" name="ketQua" readonly value="<?php echo isset($result) ? $result : " "; ?>" style="background-color: #f1f1f1ff;"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><a href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
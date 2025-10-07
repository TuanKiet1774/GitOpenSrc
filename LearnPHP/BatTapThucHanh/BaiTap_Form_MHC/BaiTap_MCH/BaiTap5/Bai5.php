<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 5 - Mảng, Chuỗi & Hàm</title>
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
        background-color: #9b0d73;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    form {
        background-color: white;
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

    table tr td {
        padding: 5px;
    }
</style>
<?php
if (isset($_POST["btn"])) {
    $mang = explode(", ", $_POST["array"]);
    $num1 = $_POST["number1"];
    $num2 = $_POST["number2"];

    function checkMang($mang)
    {
        $temp = 0;
        for ($i = 0; $i < count($mang); $i++) {
            if (!is_numeric($mang[$i])) {
                $temp++;
            }
        }
        if ($temp > 0) return 0;
        return 1;
    }

    function checkNum($num)
    {
        if (is_numeric($num)) return 1;
        else return 0;
    }

    function changeNum($num1, $num2, $mang)
    {
        $temp = 0;
        for ($i = 0; $i < count($mang); $i++) {
            if ($num1 == $mang[$i]) {
                $mang[$i] = $num2;
                $temp++;
            }
        }
        if ($temp == 0) return "Không tìm thấy $num1 trong dãy số";
        else return implode(", ", $mang);
    }

    if (checkMang($mang) and count($mang) > 0 and checkNum($num1) and checkNum($num2)) {
        $result = $num1 != $num2 ? changeNum($num1, $num2, $mang) : "Giá trị cần thay thế và giá trị thay thế phải khác nhau";
    } else {
        $result = "Mảng số hoặc số nhập vào không hợp lệ";
    }
}
?>


<body>
    <div class="container">
        <center>
            <h3 style="color: white;">THAY THẾ</h3>
        </center>
        <form action="Bai5.php" method="post">
            <table style="border-collapse: collapse;">
                <tr style="background-color: #fed6f1;">
                    <td>Nhập các phần tử: </td>
                    <td><input type="text" name="array" value="<?php echo isset($_POST["array"]) ? $_POST["array"] : " "; ?>"></td>
                </tr>
                <tr style="background-color: #fed6f1;">
                    <td>Giá trị cần thay thế: </td>
                    <td><input type="text" name="number1" value="<?php echo isset($_POST["number1"]) ? $_POST["number1"] : " "; ?>" required></td>
                </tr>
                <tr style="background-color: #fed6f1;">
                    <td>Giá trị thay thế: </td>
                    <td><input type="text" name="number2" value="<?php echo isset($_POST["number2"]) ? $_POST["number2"] : " "; ?>" required></td>
                </tr>
                <tr style="background-color: #fed6f1;">
                    <td></td>
                    <td><input type="submit" name="btn" value="Thay thế"></td>
                </tr>
                <tr>
                    <td>Mảng cũ: </td>
                    <td><input type="text" value="<?php echo isset($mang) ? implode(', ', $mang) : " "; ?>" style="background-color: #ffa4a3; color: red;" readonly></td>
                </tr>
                <tr>
                    <td>Mảng sau khi thay thế: </td>
                    <td><input type="text" value="<?php echo isset($result) ? $result : " "; ?>" style="background-color: #ffa4a3; color: red;" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">(<span style="color: red;">Ghi chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",") </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
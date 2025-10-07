<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 4 - Mảng, Chuỗi & Hàm</title>
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
        background-color: #00ff80ff;
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
        background-color: #ff058eff;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        color: white;
    }

    table tr td {
        padding: 5px;
    }
</style>
<?php
if (isset($_POST["btn"])) {
    $mang = explode(", ", $_POST["array"]);
    $num = $_POST["number"];

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

    function findNum($num, $mang)
    {
        $temp = [];
        $j = 0;
        for ($i = 0; $i < count($mang); $i++) {
            if ($num == $mang[$i]) {
                $temp[$j++] = $i + 1;
            }
        }
        if ($j > 0) {
            return "Tìm thấy $num tại vị trí: " . implode(", ", $temp);
        } else return "Không tìm thấy $num trong dãy số";
    }

    if (checkMang($mang) and count($mang) > 0 and checkNum($num)) {
        $result = findNum($num, $mang);
    } else {
        $result = "Mảng số hoặc số nhập vào không hợp lệ";
    }
}
?>


<body>
    <div class="container">
        <center>
            <h3 style="color: black;">TÌM KIẾM</h3>
        </center>
        <form action="Bai4.php" method="post">
            <table>
                <tr>
                    <td>Nhập mảng: </td>
                    <td><input type="text" name="array" value="<?php echo isset($_POST["array"]) ? $_POST["array"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Nhập số cần tìm: </td>
                    <td><input type="text" name="number" value="<?php echo isset($_POST["number"]) ? $_POST["number"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn" value="Tìm kiếm"></td>
                </tr>
                <tr>
                    <td>Mảng: </td>
                    <td><input type="text" value="<?php echo isset($mang) ? implode(', ', $mang) : " "; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm: </td>
                    <td><input type="text" value="<?php echo isset($result) ? $result : " "; ?>" style="background-color: #d8d6d6ff; color: red;" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",") </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
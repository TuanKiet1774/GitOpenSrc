<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3 - Mảng, Chuỗi & Hàm</title>
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
        background-color: #0067baff;
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
        width: 50%;
        padding-block: 5px;
        padding-inline: 10px;
        background-color: darkorange;
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
    $num = $_POST["num"];

    function taoMang($num)
    {
        $arr = [];
        for ($i = 0; $i < $num; $i++) {
            $arr[$i] = rand(0, 20);
        }
        return $arr;
    }

    function xuatMang($arr)
    {
        return implode(", ", $arr);
    }

    function tinhTong($arr)
    {
        return array_sum($arr);
    }

    function timMax($arr)
    {
        return max($arr);
    }

    function timMin($arr)
    {
        return min($arr);
    }

    if (filter_var($num, FILTER_VALIDATE_INT) && $num > 0) {
        $array = taoMang($num);
        $arrayStr = xuatMang($array);
        $sum = tinhTong($array);
        $max = timMax($array);
        $min = timMin($array);
    } else {
        $arrayStr = "Số lượng phần tử không hợp lệ (n > 0)";
    }
}
?>


<body>
    <div class="container">
        <center>
            <h3 style="color: white;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</h3>
        </center>
        <form action="Bai3.php" method="post">
            <table>
                <tr>
                    <td>Nhập số phần tử: </td>
                    <td><input type="text" name="num" value="<?php echo isset($_POST["num"]) ? $_POST["num"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center"><input type="submit" name="btn" value="Phát sinh và tính toán"></td>
                </tr>
                <tr>
                    <td>Mảng: </td>
                    <td><input type="text" name="array" value="<?php echo isset($arrayStr) ? $arrayStr : " "; ?>" style="background-color: #d8d6d6ff;"></td>
                </tr>
                <tr>
                    <td>GTLN (MAX) trong mảng: </td>
                    <td><input type="text" name="Max" value="<?php echo isset($max) ? $max : " "; ?>" style="background-color: #d8d6d6ff;" readonly></td>
                </tr>
                <tr>
                    <td>GTNN (MIN) trong mảng: </td>
                    <td><input type="text" name="Min" value="<?php echo isset($min) ? $min : " "; ?>" style="background-color: #d8d6d6ff;" readonly></td>
                </tr>
                <tr>
                    <td>Tổng mảng: </td>
                    <td><input type="text" name="sum" value="<?php echo isset($sum) ? $sum : " "; ?>" style="background-color: #d8d6d6ff;" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">(<span style="color: red;">Chú ý: </span>Các phần tử trong mảng sẽ có giá trị từ 0 đến 20) </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
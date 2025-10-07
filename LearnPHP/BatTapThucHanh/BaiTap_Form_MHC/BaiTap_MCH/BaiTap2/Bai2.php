<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2 - Mảng, Chuỗi & Hàm</title>
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
        background-color: yellow;
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
    $sum = $_POST["sum"];
    $count = 0;

    $ar = explode(",", $num);
    foreach ($ar as $key => $value) {
        if (!is_numeric($ar[$key])) {
            $count++;
        }
    }
    if ($count == 0) {
        $arp = array_sum($ar);
    } else {
        $arp = "Dãy số không hợp lệ";
    }
}
?>

<body>
    <div class="container">
        <center>
            <h3>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
        </center>
        <form action="Bai2.php" method="post">
            <table>
                <tr>
                    <td>Nhập dãy số: </td>
                    <td><input type="text" name="num" value="<?php echo isset($_POST["num"]) ? $_POST["num"] : " "; ?>"> <span style="color: red;">(*)</span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Tính tổng"></td>
                </tr>
                <tr>
                    <td>Tổng dãy số: </td>
                    <td><input type="text" name="sum" readonly value="<?php echo isset($arp) ? $arp : " "; ?>" style="background-color: #d8d6d6ff;"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><span style="color: red;">(*)</span> Các số được nhập cách nhau bằng dấu "," </td>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>
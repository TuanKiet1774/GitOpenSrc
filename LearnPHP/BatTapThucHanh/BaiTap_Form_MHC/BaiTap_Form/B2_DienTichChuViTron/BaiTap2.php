<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích và Chu vi hình tròn</title>
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
        background-color: bisque;
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
    $bankinh = $_POST["banKinh"];
    $cv = $_POST["chuVi"];
    $dt = $_POST["dienTich"];
    define("Pi", 3.14);

    if (is_numeric($bankinh) and $bankinh > 0) {
        $dt = round(Pi * $bankinh * $bankinh, 2);
        $cv = round(2 * Pi * $bankinh, 2);
    } else {
        $dt = $cv = "Thông số không hợp lệ";
    }
}
?>

<body>
    <div class="container">
        <center>
            <h3>DIỆN TÍCH và CHU VI HÌNH TRÒN</h3>
        </center>
        <form action="BaiTap2.php" method="post">
            <table>
                <tr>
                    <td>Bán kính: </td>
                    <td><input type="text" name="banKinh" value="<?php echo isset($_POST["banKinh"]) ? $_POST["banKinh"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Chu vi: </td>
                    <td><input type="text" name="chuVi" readonly value="<?php echo isset($cv) ? $cv : " "; ?>" style="background-color: #ccc;"></td>
                </tr>
                <tr>
                    <td>Diện tích: </td>
                    <td><input type="text" name="dienTich" readonly value="<?php echo isset($dt) ? $dt : " "; ?>" style="background-color: #ccc;"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Tính"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
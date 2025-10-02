<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên 2 số (Mở rộng)</title>
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
        background-color: #d8ce41ff;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    table tr td {
        padding: 5px;
    }
</style>

<body>
    <div class="container">
        <center style="color: white;">
            <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
        </center>
        <form action="KQBaiTap7.php" method="post">
            <table>
                <tr style="color: red;">
                    <td>Chọn phép tính: </td>
                    <td style="display: flex; justify-content: space-around; align-items: center;">
                        <label><input type="radio" name="cal" value="Cộng" checked> Cộng</label>
                        <label><input type="radio" name="cal" value="Trừ"> Trừ</label>
                        <label><input type="radio" name="cal" value="Nhân"> Nhân</label>
                        <label><input type="radio" name="cal" value="Chia"> Chia</label>
                    </td>
                </tr>
                <tr>
                    <td>Số thứ nhât: </td>
                    <td><input type="text" name="num1" value="<?php echo isset($_POST["num1"]) ? $_POST["num1"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td>Số thứ 2: </td>
                    <td><input type="text" name="num2" value="<?php echo isset($_POST["num2"]) ? $_POST["num2"] : " "; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Tính"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
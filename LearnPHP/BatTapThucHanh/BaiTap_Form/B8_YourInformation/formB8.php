<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Your Information</title>
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
        background-color: #ffffffff;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    form {
        background-color: white;
    }

    input[type=text],
    input[type=password] {
        width: 400px;
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
        background-color: #d8ce41ff;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    select {
        width: 100%;
        padding-block: 5px;
        padding-inline: 10px;
    }

    table tr td {
        padding: 5px;
        margin: 5px;
    }
</style>

<body>
    <div class="container">
        <fieldset>
            <legend style="margin-left: 10px;"><b>Enter Your Information</b></legend>
            <form action="config.php" method="post">
                <table>
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="fullName" value="<?php echo isset($_POST["fullName"]) ? $_POST["fullName"] : " "; ?>"></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><input type="text" name="address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : " "; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td><input type="text" name="phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : " "; ?>"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td style="display: flex; justify-content: space-around; align-items: center;">
                            <label><input type="radio" name="sex" value="Nam" checked> Nam</label>
                            <label><input type="radio" name="sex" value="Nữ"> Nữ</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Country: </td>
                        <td>
                            <select name="country">
                                <option value="Việt Nam">Việt Nam</option>
                                <option value="Anh Quốc">Anh Quốc</option>
                                <option value="Nhật Bản">Nhật Bản</option>
                                <option value="Hàn Quốc">Hàn Quốc</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Study</td>
                        <td style="display: flex; justify-content: space-around; align-items: center;">
                            <label><input type="checkbox" name="study[]" value="PHP & MySQL"> PHP & MySQL</label>
                            <label><input type="checkbox" name="study[]" value="ASP.NET"> ASP.NET</label>
                            <label><input type="checkbox" name="study[]" value="CCNA"> CCNA</label>
                            <label><input type="checkbox" name="study[]" value="Security+"> Security+</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Note: </td>
                        <td><textarea id="note" name="note" rows="5" cols="55"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="btn" value="Gửi">
                            <input type="reset" value="Huỷ">
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
</body>

</html>
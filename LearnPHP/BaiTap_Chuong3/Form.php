<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký</title>
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
        background-color: white;
        padding: 20px;
        border-radius: 15px;
        align-items: center;
    }

    table tr td {
        padding: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        border: 2px solid transparent;
        border-radius: 5px;
        background: linear-gradient(#fff, #fff) padding-box,
            linear-gradient(to right, #6DB6F1, #9375D8) border-box;
        width: 250px;
        padding: 10px;
    }


    input[type="submit"] {
        background: linear-gradient(to right, #6DB6F1, #9375D8);
        border-radius: 5px;
        border: none;
        color: white;
        font-weight: bold;
    }

    form {
        padding-block: 20px;
    }

    .title-row {
        font-weight: bold;
    }

    .line {
        height: 1px;
        background: linear-gradient(to right, #6DB6F1, #9375D8);
        width: 20px;
    }
</style>

<body>
    <div class="container">
        <h3>
            Registration <div class="line"></div>
        </h3>
        <form action="Process.php" method="get">
            <table>
                <tr>
                    <td class="title-row">Full Name</td>
                    <td class="title-row">User Name</td>
                </tr>
                <tr>
                    <td><input type="text" name="fullName" value="<?php if (isset($_GET["fullName"])) echo $_GET["fullName"]; ?>"></td>
                    <td><input type="text" name="userName" value="<?php if (isset($_GET["userName"])) echo $_GET["userName"]; ?>"></td>
                </tr>
                <tr>
                    <td class="title-row">Email</td>
                    <td class="title-row">Phone Number</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="<?php if (isset($_GET["email"])) echo $_GET["email"]; ?>"></td>
                    <td><input type="text" name="phoneNumber" value="<?php if (isset($_GET["phoneNumber"])) echo $_GET["phoneNumber"]; ?>"></td>
                </tr>
                <tr>
                    <td class="title-row">Password</td>
                    <td class="title-row">Confirm Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="pass"></td>
                    <td><input type="password" name="confirm"></td>
                </tr>
                <tr>
                    <td colspan="2" class="title-row">Gender<b>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="display: flex; justify-content: space-between; width: 70%;">
                            <label> <input type="radio" name="sex" value="Male" checked> Male</label>
                            <label> <input type="radio" name="sex" value="Female>"> Female</label>
                            <label> <input type="radio" name="sex" value="Other"> Other</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="align-items: center; text-align: center; ">
                        <input type="submit" name="btnSend" value="Register" style="width: 100%; height: 30px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
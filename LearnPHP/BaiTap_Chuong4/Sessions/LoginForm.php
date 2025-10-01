<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Cookies</title>
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
        padding: 10px;
        border-radius: 15px;
        align-items: center;
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
        background-color: yellowgreen;
        cursor: pointer;
        border: none;
    }

    table tr td {
        padding: 5px;
    }
</style>

<?php
session_start();
?>

<body>
    <div class="container">
        <form action="WelcomeSessions.php" method="get">
            <table>
                <tr>
                    <th colspan="2" align="center">
                        <h3>Login Form</h3>
                    </th>
                </tr>
                <tr>
                    <td>User name</td>
                    <td><input type="text" name="userName" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" maxlength="8" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
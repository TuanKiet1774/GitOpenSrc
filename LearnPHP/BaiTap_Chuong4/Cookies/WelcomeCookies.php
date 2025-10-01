<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Cookies</title>
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
</style>

<body>
    <?php
    if (isset($_GET["btn"])) {
        $userName = $_GET["userName"];
        $password = $_GET["password"];

        setcookie("user", $userName, time() + 3600 * 24);
        setcookie("pass", $password, time() + 3600 * 24);
    }
    ?>
    <div class="container">
        <?php
        if (!isset($_COOKIE["user"])) {
            echo "<h3>Vui lòng đăng nhập trước</h3>";
            echo "<p>Cookies đã được cài đặt</p>";
        } else {
            echo "<h2>Bạn đã đăng nhập thành công.</h2>";
            echo "<h2> Welcome " . $_COOKIE['user'] . " to Cookies</h2>";
        }
        ?>


    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Sessions</title>
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

<!-- Khi thoát trình duyệt thì session sẽ mất -->
<?php
session_start();
?>

<body>
    <div class="container">
        <?php
        if (isset($_GET["btn"])) {
            $_SESSION["user"] = $_GET["userName"];
            $_SESSION["pass"] = $_GET["password"];
        }

        if (!isset($_SESSION["user"])) {
            echo "<h3>Vui lòng đăng nhập trước</h3>";
        } else {
            echo "<h2>Bạn đã đăng nhập thành công.</h2>";
            echo "<h2> Welcome " . $_SESSION['user'] . " to Sessions</h2>";
        }
        ?>
    </div>
</body>

</html>
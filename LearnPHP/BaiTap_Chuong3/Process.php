<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To PHP</title>
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
</style>

<body>
    <?php
    $full = $_GET['fullName'];
    $user = $_GET['userName'];
    $email = $_GET['email'];
    $phone = $_GET['phoneNumber'];
    $pass = $_GET['pass'];
    $confirm = $_GET['confirm'];
    $gender = $_GET['sex'];

    if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["btnSend"])) {
        if ($pass == $confirm) {
            echo "<div class ='container'>";
            echo "<h3>WELCOME TO PHP $full</h3>";
            echo "<ul style='list-style-type: none;'>";
            echo "<li><b>Your user name:</b> $user</li>";
            echo "<li><b>Your phone number:</b> $phone</li>";
            echo "<li><b>Your email:</b> $email</li>";
            echo "<li><b>Your gender:</b> $gender</li>";
            echo "</ul>";
            echo "</div>";
        } else {
            echo "<div class ='container'>";
            echo "<h3>Incorrect confirm password</h3>";
            echo "<span><i>Please try again</i></span>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>
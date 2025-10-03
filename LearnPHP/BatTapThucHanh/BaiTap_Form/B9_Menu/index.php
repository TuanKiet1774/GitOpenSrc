<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        /* display: flex;
        justify-content: center;
        align-items: center; */
        width: 100%;
        height: 100vh;
        background: linear-gradient(to right, #6DB6F1, #9375D8);
    }

    .menu {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ffffffff;
    }

    ul {
        width: 80%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        list-style: none;
        padding: 5px;
    }

    a {
        text-decoration: none;
        color: black;
        font-size: 20px;
    }

    .content {
        width: 100%;
    }
</style>

<body>
    <div class="menu">
        <ul>
            <li><a href="index.php?page=trangchu">🏠 Trang Chủ</a></li>
            <li><a href="index.php?page=gioithieu">🙋‍♂️ Giới Thiệu</a></li>
            <li><a href="index.php?page=tintuc">📰 Tin Tức</a></li>
            <li><a href="index.php?page=lienhe">☎️ Liên Hệ</a></li>
            <li><a href="index.php?page=diendan">🎙️ Diễn đàn</a></li>
        </ul>
    </div>

    <div class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $file = $page . ".php";

            if (file_exists($file)) {
                include($file);
            }
        } else {
            include("trangchu.php");
        }
        ?>
        <!-- include dùng để chèn hay nhúng nội dung của file khác vào file hiện tại -->
    </div>
</body>

</html>
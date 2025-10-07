<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1 - Mảng, Chuỗi & Hàm</title>
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
</style>

<body>
    <div class="container">
        <?php
        $n = rand(0, 50);
        $a = [$n];
        $cauC = $cauD = $cauE = $f = 0;
        $cauF = [];

        echo "<b>Số n ngẫu nhiên: </b> $n <br>";
        for ($i = 0; $i < $n; $i++) {
            $a[$i] = rand(-50, 50);
            if ($a[$i] % 2 == 0) $cauC++;
            if ($a[$i] < 100) $cauD++;
            if ($a[$i] < 0) $cauE += $a[$i];
            if ($a[$i] == 0) $cauF[$f++] = $i;
        }

        echo "<b>Mảng số ngẫu nhiên: </b>" . implode(", ", $a) . "<br>";
        echo "<b>Số lượng phần tử có giá trị chẵn: </b>$cauC <br>";
        echo "<b>Số lượng phần tử có giá trị nhỏ hơn 100: </b>$cauD <br>";
        echo "<b>Tổng các phần tử âm: </b> $cauE <br>";
        echo "<b>In ra vị trí các phẩn tử có giá trị bằng 0: </b>";
        if (count($cauF) > 0) implode(", ", $cauF) . "<br>";
        else echo "Không có <br>";
        sort($a);
        echo "<b>Sắp xếp mảng theo thứ tự tăng dẫn:</b> " . implode(", ", $a);
        ?>
    </div>
</body>

</html>
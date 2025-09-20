<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập Điểm Danh</title>
</head>
<style>
    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #000000ff;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .line {
        height: 2px;
        background-color: #000000ff;
        margin: 20px 0;
    }

    table,
    td,
    tr {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <div class="container">
        <p><strong>Bài 4:</strong> Viết hàm tính C(k,n), A(k,n). Với k, n là số nguyên dương</p>
        <?php
        $n = random_int(1, 10);
        $k = random_int(1, $n);

        function giaiThua($n)
        {
            $temp = 1;
            for ($i = 1; $i <= $n; $i++) {
                $temp *= $i;
            }
            return $temp;
        }

        function toHop($k, $n)
        {
            $temp = (float) giaiThua($n) / (giaiThua($k) * giaiThua($n - $k));
            return $temp;
        }

        function chinhHop($k, $n)
        {
            $temp = (float) giaiThua($n) / giaiThua($n - $k);
            return $temp;
        }

        echo "{$n} A {$k} = " . chinhHop($k, $n) . "<br>";
        echo "{$n} C {$k} = " . toHop($k, $n);
        ?>

        <div class="line"></div>

        <p><strong>Bài 5:</strong> Tô màu ô có giá trị là chẵn</p>

        <table>
            <tr>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<td>";
                    echo "<strong>Chương $i</strong>";
                    echo "</td>";
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<td>";
                    for ($j = 1; $j <= 10; $j++) {
                        $color = (($i * $j) % 2 == 0) ? "red" : "blue";
                        echo "<span style='background-color: $color; display: inline-block; width: 100%;'>" . "$i x $j = " . ($i * $j) . "<br></span>";
                    }
                    echo "</td>";
                }
                ?>
            </tr>
        </table>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập Trang 78 Chương 2</title>
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
</style>

<body>
    <div class="container">
        <p><strong>Bài 1:</strong> Viết 1 trang web nhận một giá trị ngẫu nhiên là số tự nhiên N có giá trị từ 1 → 100. Hãy xuất ra trình duyệt số chẵn nằm trong khoảng 1 -> N đó:</p>
        <?php
        $N = rand(1, 100);
        $temp = [];
        for ($i = 1; $i <= $N; $i++) {
            if ($i % 2 == 0) {
                $temp[] = $i;
            }
        }
        $count = count($temp);
        echo "<p>Có tất cả $count số</p>";
        echo "<p>Các số chẵn trong khoẳng từ 1 => $N: " . implode(", ", $temp) . "</p>";
        ?>

        <div class="line"></div>

        <p><strong>Bài 2:</strong> Xây dựng trang web Xuất ra bảng cửu chương từ 1 => 10.</p>
        <?php
        echo "<div style='display: flex; flex-wrap: wrap; justify-content: center;'>";

        for ($i = 1; $i <= 10; $i++) {
            echo "<ul style='list-style-type: none; width: 15%;'>";
            echo "<li><strong>Bảng nhân $i</strong></li>";
            echo "<li>";
            for ($j = 1; $j <= 10; $j++) {
                echo "$i x $j = " . ($i * $j) . "<br>";
            }
            echo "</li>";
            echo "</ul>";
        }

        echo "</div>";
        ?>

        <div class="line"></div>
        <p><strong>Bài 3:</strong> Viết 1 trang web nhận một giá trị ngẫu nhiên là số tự nhiên N có giá trị trong [−100; 100]. Sau đó kiểm tra N có là số dương không? Nếu thỏa thì:
        <ul>
            <li>In ra các ước số của N</li>
            <li>Viết hàm kiểm tra xem N có phải là số nguyên tố không?</li>
            <li>Tính tổng các số nguyên tố < N</li>
            <li>Kiểm tra N có là số chính phương?</li>
        </ul>

        <?php
        $N = rand(-100, 100);
        echo "<span><strong>Số ngẫu nhiên N = $N</strong></span><br>";

        function uocSoN($N)
        {
            $temp = [];
            if ($N <= 0) return [];
            for ($i = 1; $i <= $N; $i++) {
                if ($N % $i == 0) {
                    $temp[] = $i;
                }
            }
            return $temp;
        }

        function checkSNT($N)
        {
            if ($N < 2) return 0;
            for ($i = 2; $i <= sqrt($N); $i++)
                if ($N % $i == 0)
                    return 0;
            return 1;
        }

        function sumNguyenTo($N)
        {
            if ($N < 2) return 0;
            $temp = 0;
            for ($i = 2; $i <= $N; $i++)
                if (checkSNT($i))
                    $temp += $i;
            return $temp;
        }

        function checkSCP($N)
        {
            if ($N < 0) return 0;
            $temp = (int)sqrt($N);
            return $temp * $temp == $N;
        }


        echo "<ul>
        <li>Các ước số của $N là: " . (count(uocSoN($N)) == 0 ? "Không có" : implode(", ", uocSoN($N))) . "</li>
        <li>Số N = $N " . (checkSNT($N) ? "là số nguyên tố" : "không phải là số nguyên tố") . "</li>
        <li>Tổng các số nguyên tố nhỏ hơn $N: " . sumNguyenTo($N) . "</li>
        <li>Số N = $N " . (checkSCP($N) ? "là số chính phương" : "không phải là số chính phương") . "</li>
        </ul>";
        ?>
        </p>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 6 - Mảng, Chuỗi & Hàm</title>
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
        background-color: #37989c;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    form {
        background-color: #cfdfd5;
    }

    input[type=text],
    input[type=password] {
        width: 500px;
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
        background-color: #ffffffff;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        color: black;
    }

    table tr td {
        padding: 5px;
    }
</style>
<?php
if (isset($_POST["btn"])) {
    $mang = explode(", ", $_POST["array"]);

    function checkMang($mang)
    {
        $temp = 0;
        for ($i = 0; $i < count($mang); $i++) {
            if (!is_numeric($mang[$i])) {
                $temp++;
            }
        }
        if ($temp > 0) return 0;
        return 1;
    }

    // Hàm sắp xếp tăng
    // function SortTang($mang)
    // {
    //     if (checkMang($mang)) {
    //         $temp = $mang;
    //         sort($temp);
    //         return implode(", ", $temp);
    //     }
    //     return "Mảng nhập vào không hợp lệ";
    // }

    // // Hàm sắp xếp giảm
    // function SortGiam($mang)
    // {
    //     if (checkMang($mang)) {
    //         $temp = $mang;
    //         rsort($temp);
    //         return implode(", ", $temp);
    //     }
    //     return "Mảng nhập vào không hợp lệ";
    // }

    function Swap(&$a, &$b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    function SortTang($mang)
    {
        if (checkMang($mang)) {
            $temp = $mang;
            $n = count($mang);
            for ($i = 0; $i < $n; $i++) {
                for ($j = $i + 1; $j < $n; $j++) {
                    if ($temp[$i] > $temp[$j]) {
                        Swap($temp[$i], $temp[$j]);
                    }
                }
            }
            return implode(", ", $temp);
        } else {
            return "Mảng nhập vào không hợp lệ";
        }
    }

    function SortGiam($mang)
    {
        if (checkMang($mang)) {
            $temp = $mang;
            $n = count($temp);
            for ($i = 0; $i < $n; $i++) {
                for ($j = $i + 1; $j < $n; $j++) {
                    if ($temp[$i] < $temp[$j]) {
                        Swap($temp[$i], $temp[$j]);
                    }
                }
            }
            return implode(", ", $temp);
        } else {
            return "Mảng nhập vào không hợp lệ";
        }
    }

    $mangtang = count($mang) >= 2 ? SortTang($mang) : "Tối thiểu có 2 phần tử trong mảng";
    $manggiam = count($mang) >= 2 ? SortGiam($mang) : "Tối thiểu có 2 phần tử trong mảng";
}
?>


<body>
    <div class="container">
        <center>
            <h3 style="color: white;">SẮP XẾP MẢNG</h3>
        </center>
        <form action="Bai6.php" method="post">
            <table style="border-collapse: collapse;">
                <tr>
                    <td>Nhập mảng: </td>
                    <td><input type="text" name="array" value="<?php echo isset($_POST["array"]) ? $_POST["array"] : " "; ?>"><span style="color: red;"> (*)</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn" value="Sắp xếp tăng/giảm"></td>
                </tr>
                <tr style="background-color: #cce6e7;">
                    <td style="color: red; font-weight: bold;">Sau khi sắp xếp: </td>
                    <td></td>
                </tr>
                <tr style="background-color: #cce6e7;">
                    <td>Tăng dần: </td>
                    <td><input type="text" value="<?php echo isset($mangtang) ? $mangtang : " "; ?>" style="background-color: #cbfdff;" readonly></td>
                </tr>
                <tr style="background-color: #cce6e7;">
                    <td>Giảm dần: </td>
                    <td><input type="text" value="<?php echo isset($manggiam) ? $manggiam : " "; ?>" style="background-color: #cbfdff;" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">(<span style="color: red;">Ghi chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",") </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
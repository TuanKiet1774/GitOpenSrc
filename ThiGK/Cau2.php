<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh hợp Online</title>
</head>
<style>
    .container {
        width: 100%;
    }

    table {
        padding: 5px;
        width: fit-content;
        background-color: chartreuse;
        border-collapse: collapse;
        margin: auto;
    }

    input[type="text"] {
        padding: 5px;
        width: 500px;
        border-radius: 5px;
    }

    input[type="submit"] {
        border: none;
        border-radius: 15px;
        padding: 5px;
        width: 100px;
        background-color: blue;
    }

    input[type="button"] {
        padding: 5px;
        width: 100px;
        background-color: red;
        border: none;
        border-radius: 15px;
    }

    td {
        padding: 5px;
    }

    .inp-kq {
        height: 100px;
    }
</style>

<body>
    <?php
    function giaiThua($n)
    {
        $temp = 1;
        for ($i = 1; $i <= $n; $i++) {
            $temp *= $i;
        }
        return $temp;
    }

    function checkNum($n)
    {
        if (filter_var($n, FILTER_VALIDATE_INT) !== false && $n > 0) {
            return true;
        } else {
            return false;
        }
    }

    if (isset($_POST['btnsend'])) {
        $numK = $_POST['numk'];
        $numN = $_POST['numn'];

        if (checkNum($numK) && checkNum($numN) && $numK <= $numN) {
            $gt = giaiThua($numN) / giaiThua($numN - $numK);
            $kq = "Chỉnh hợp chập $numK của $numN phần tử là: $gt";
            $tb = "Có $gt cách chọn ra $numK phần tử (có phân biệt thứ tự) từ một tập hợp có $numN phần tử.";
        } else {
            $kq = "Số n hoặc k nhập vào không hợp lệ. Vui lòng nhập số nguyên dương và k ≤ n.";
            $tb = "";
        }
    }

    if (isset($_POST['btnreset'])) {
        $numk = $_POST['numk'];
        $numN = $_POST['numn'];

        if (isset($numK) || isset($numN)) {
            $numk = $numN = "";
        }
    }
    ?>

    <div class="container">
        <form action="./Cau2.php" method="post">
            <table>
                <tr>
                    <th colspan="2">
                        <h3>TÍNH CHỈNH HỢP CHẤP K CỦA N PHẦN TỬ</h3>
                    </th>
                </tr>
                <tr>
                    <td><b>Nhập k</b></td>
                    <td>
                        <input type="text" name="numk" value="<?php echo isset($_POST['numk']) ? $_POST['numk'] : "" ?>">
                    </td>
                </tr>
                <tr>
                    <td><b>Nhập n</b></td>
                    <td>
                        <input type="text" name="numn" value="<?php echo isset($_POST['numn']) ? $_POST['numn'] : "" ?>">
                    </td>
                </tr>
                <tr>
                    <td><b>Kết quả</b></td>
                    <td>
                        <textarea class="inp-kq" readonly cols="70"><?php echo isset($kq) ? $kq . "\n" . $tb : "" ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsend" value="Tính chỉnh hợp">
                        <input type="button" name="btnreset" value="Làm mới" onclick="window.location.href=window.location.pathname">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>
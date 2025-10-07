<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 7 - Mảng, Chuỗi & Hàm</title>
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
        background-color: #1061cc;
        padding: 10px;
        border-radius: 15px;
        align-items: center;
    }

    form {
        background-color: #b9eeff;
    }

    input[type=text],
    input[type=password] {
        width: 150px;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 10px;
    }

    input[type=submit],
    input[type=reset] {
        width: fit-content;
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

    img {
        width: 200px;
        border-radius: 15px;
    }
</style>
<?php
if (isset($_POST["btn"])) {
    $year = $_POST["year"];
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

    if (is_numeric($year) and $year > 0) {
        $nam = $year - 3;
        $can = $nam % 10;
        $chi = $nam % 12;
        $nam_al = $mang_can[$can];
        $nam_al = $nam_al . " " . $mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $hinh_anh = "<img src = 'img/$hinh'>";
    } else {
        $nam_al = "Error !!!";
    }
}
?>


<body>
    <div class="container">
        <center>
            <h3 style="color: white;">TÍNH NĂM ÂM LỊCH</h3>
        </center>
        <form action="Bai7.php" method="post">
            <table>
                <tr align="center">
                    <td>Năm dương lịch</td>
                    <td></td>
                    <td>Năm âm lịch</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="year" value="<?php echo isset($_POST["year"]) ? $_POST["year"] : "" ?>">
                    </td>
                    <td>
                        <input type="submit" name="btn" value="=>" style="background-color: #f9ffda; color: red;">
                    </td>
                    <td>
                        <input type="text" style="background-color: #f9ffda; color: red;" value="<?php echo isset($nam_al) ? $nam_al : "" ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" style="height: 200px;">
                        <?php
                        if (isset($hinh_anh))
                            echo $hinh_anh;
                        else
                            echo "<img src = 'https://i.pinimg.com/originals/02/78/fa/0278fac7a74a3d81ea25d30985289eae.gif'>";
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
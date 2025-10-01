<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền Karaoke</title>
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

    input[type=time],
    input[type=text] {
        width: 200px;
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
        background-color: yellowgreen;
        cursor: pointer;
        border: none;
    }

    table tr td {
        padding: 5px;
    }
</style>

<body>
    <div class="container">
        <form action="" method="get">
            <center>
                <h3>TÍNH TIỀN KARAOKE</h3>
            </center>
            <table>
                <tr>
                    <td>Giờ bắt đầu: </td>
                    <td><input type="time" name="timeStart" value="<?php echo isset($_GET["timeStart"]) ? $_GET["timeStart"] : ""; ?>"> (hh:mm)</td>
                </tr>
                <tr>
                    <td>Giờ kết thúc: </td>
                    <td><input type="time" name="timeEnd" value="<?php echo isset($_GET["timeEnd"]) ? $_GET["timeEnd"] : ""; ?>"> (hh:mm)</td>
                </tr>
                <tr>
                    <td>Tiền thanh toán:</td>
                    <?php
                    if (isset($_GET['btnsubmit'])) {
                        //Kiểm tra điều kiện thời gian không được trống
                        if (isset($_GET["timeStart"]) && isset($_GET["timeEnd"]) && $_GET["timeStart"] != "" && $_GET["timeEnd"] != "") {
                            $start = strtotime($_GET['timeStart']);
                            $end = strtotime($_GET['timeEnd']);
                            $money = $_GET['money'];
                            //Giá tiền của 1 giờ
                            $pricePerHour = 150000;

                            //Thời gian kết thúc bé hơn thời gian bắt đầu ==> qua ngày hôm sau
                            if ($start > $end) {
                                $end += 24 * 3600;
                            }

                            $money = (($end - $start) / 3600) * $pricePerHour;
                        } else {
                            $money = "Vui lòng nhập đầy đủ thông tin!";
                        }

                        if (isset($_GET['btnreset'])) {
                            // $_GET["timeStart"] = "00:00";
                            // $_GET["timeEnd"] = "00:00";
                            $money = "";
                        }
                    }
                    ?>
                    <td><input type="text" name="money" value="<?php echo isset($money) ? $money : " "; ?>" readonly> (VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Tính tiền" name="btnsubmit">
                        <input type="submit" name="btnreset" value="Nhập lại">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>
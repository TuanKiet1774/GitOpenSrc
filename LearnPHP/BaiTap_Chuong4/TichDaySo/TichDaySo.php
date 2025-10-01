<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tình tích dãy số</title>
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

    input[type=text] {
        width: 200px;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding-left: 10px;
    }

    input[type=submit] {
        width: 100%;
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
            <table>
                <tr>
                    <th colspan="2" align="center">
                        <span>TÍCH DÃY SỐ</span>
                    </th>
                </tr>
                <tr>
                    <td>
                        <span>Dãy số: </span>
                    </td>
                    <td><input type="text" name="number" placeholder="1, 2, 3,..." value="<?php if (isset($_GET["number"]) && !is_numeric($_GET["number"])) echo $_GET["number"]; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Tích"></td>
                </tr>
                <tr>
                    <td>Kết quả: </td>
                    <?php
                    $btn = $_GET["btnsubmit"];
                    $number = $_GET["number"];
                    $count = 0;

                    if (isset($btn)) {
                        $ar = explode(",", $number);
                        foreach ($ar as $key => $value) {
                            if (!is_numeric($ar[$key])) {
                                $count++;
                            }
                        }
                        if ($count == 0) {
                            $arp = array_product($ar);
                        } else {
                            $arp = "Dãy số không hợp lệ";
                        }
                    }
                    ?>
                    <td><input type="text" name="KQ" value="<?php echo isset($arp) ? $arp : " "; ?>" readonly></td>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>
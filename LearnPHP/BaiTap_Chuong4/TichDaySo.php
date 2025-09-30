<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Tích dãy số</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Dãy số: </span>
                </td>
                <td><input type="text" name="number" value="<?php if (isset($_POST["number"])) echo $_POST["number"]; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnsubmit" value="Tính tích"></td>
            </tr>
            <tr>
                <td>Kết quả: </td>
                <?php
                if (isset($_POST["btnsubmit"])) {
                    $ar = explode(",", $_POST["number"]);
                    $arp = array_product($ar);
                }
                ?>
                <td><input type="text" name="KQ" value="<?php echo isset($arp) ? $arp : " "; ?>" readonly></td>
            </tr>

        </table>
    </form>
</body>

</html>
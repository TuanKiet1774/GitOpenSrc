<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Information</title>
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
            width: 500px;
            background-color: #fff;
            padding: 15px;
            border-radius: 15px;
        }
        table tr td {
            padding: 6px;
            vertical-align: top;
        }
        b { color: #444; }
    </style>
</head>

<body>
    <div class="container">
        <fieldset>
            <legend><b>Your Information</b></legend>
            <center><b style="color: green;">You have entered the information successfully.</b></center>
            <table>
                <tr>
                    <td><b>Full Name: </b></td>
                    <td><?php echo !empty($_POST['fullName']) ? $_POST['fullName'] : "Không có"; ?></td>
                </tr>
                <tr>
                    <td><b>Address:</b></td>
                    <td><?php echo !empty($_POST['address']) ? $_POST['address'] : "Không có"; ?></td>
                </tr>
                <tr>
                    <td><b>Phone:</b></td>
                    <td><?php echo !empty($_POST['phone']) ? $_POST['phone'] : "Không có"; ?></td>
                </tr>
                <tr>
                    <td><b>Gender:</b></td>
                    <td><?php echo !empty($_POST['sex']) ? $_POST['sex'] : "Không có"; ?></td>
                </tr>
                <tr>
                    <td><b>Study:</b></td>
                    <td>
                        <?php
                        if (!empty($_POST["study"])) {
                            echo implode(", ", $_POST["study"]);
                        } else {
                            echo "Không có";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Country:</b></td>
                    <td><?php echo !empty($_POST['country']) ? $_POST['country'] : "Không có"; ?></td>
                </tr>
                <tr>
                    <td><b>Note:</b></td>
                    <td><?php echo !empty($_POST['note']) ? $_POST['note'] : "Không có"; ?></td>
                </tr>
            </table>
        </fieldset>
    </div>
</body>
</html>

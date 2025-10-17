<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_db = 'ql_ban_sua';
$db_port = 3306;

##### Kết nối bằng hàm #####
$conn = mysqli_connect(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);

if (!$conn) {
    die("Kết nối thất bại " . mysqli_connect_error());
}

?>

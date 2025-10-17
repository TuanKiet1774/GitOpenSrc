<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_db = 'ql_sinh_vien';
$db_port = 3306;

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
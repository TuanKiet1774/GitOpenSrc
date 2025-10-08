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

// echo 'Success: A proper connection to MySQL was made.';
// echo '<br>';
// echo 'Host information: ' . mysqli_get_host_info($conn);
// echo '<br>';
// echo 'Protocol version: ' . mysqli_get_proto_info($conn);
// echo '<br>';
// var_dump($conn);

//##### Kết nối bằng đối tượng #####

// $conn = new mysqli(
//     $db_host,
//     $db_user,
//     $db_password,
//     $db_db
// );

// if ($conn->connect_error) {
//     die("Kết nối thất bại " . $conn->connect_error);
// }

// echo 'Success: A proper connection to MySQL was made.';
// echo '<br>';
// echo 'Host information: ' . $conn->host_info;
// echo '<br>';
// echo 'Protocol version: ' . $conn->protocol_version;
// echo '<br>';
// var_dump($conn);

// $conn->close();

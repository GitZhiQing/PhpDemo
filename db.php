<?php
$host = 'localhost';
$port = '3306';
$db_name = 'demo';
$db_username = 'admin';
$db_password = '123456';

$conn = new mysqli($host, $db_username, $db_password, $db_name, $port);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

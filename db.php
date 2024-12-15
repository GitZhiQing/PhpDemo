<?php
$host = 'localhost';
$port = '3306';     // MySQL 默认端口为 3306
$db_name = '';      // 数据库名
$db_username = '';  // 数据库用户名
$db_password = '';  // 数据库密码

$conn = new mysqli($host, $db_username, $db_password, $db_name, $port);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

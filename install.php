<?php
if (file_exists("install.lock")) {
    ?>
    <script>
        alert("系统已经初始化！");
        location.href = "index.php";
    <?php
    exit();
}

include_once 'db.php';
global $conn; # 屏蔽 PHPStorm 的警告

$sql = "DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
);
";

if ($conn->multi_query($sql) === TRUE) {
    file_put_contents("install.lock", "lock");
    header("Location: index.php");
} else {
    echo "数据表创建失败: " . $conn->error;
}

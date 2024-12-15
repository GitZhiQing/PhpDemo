<?php
session_start();
if (!file_exists('install.lock')) {
    ?>
    <script>
        alert('系统尚未初始化！');
        location.href = 'install.php';
    </script>
    <?php
    exit;
}
if (!isset($_SESSION['username'])) {
    ?>
    <script>
        alert('请先登录！');
        location.href = 'login.php';
    </script>
    <?php
    exit;
}
?>

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>首页</title>
</head>
<body>
<h1>你好, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<a href="logout.php">注销</a>
</body>
</html>
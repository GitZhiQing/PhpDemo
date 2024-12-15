<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include_once 'db.php';
global $conn; # 屏蔽 PHPStorm 的警告

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        ?>
        <script>
            alert('登录成功');
            location.href = 'index.php';
        </script>
        <?php
        exit;
    } else {
        $error = '用户名或密码错误';
    }
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
    <title>登录</title>
</head>
<body>
<div class="form-container">
    <h3>登录</h3>
    <form method="post">
        <label>
            <span>用户名</span>
            <input type="text" name="username" placeholder="请输入用户名" required>
        </label>
        <label>
            <span>密码</span>
            <input type="password" name="password" placeholder="请输入密码" required>
        </label>
        <button type="submit">登录</button>
    </form>
    <?php if (isset($error)) {
        echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
    } ?>
    <a href="register.php">没有账号，注册</a>
</div>
</body>
</html>
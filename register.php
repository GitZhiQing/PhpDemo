<?php
session_start();

include_once 'db.php';
global $conn; # 屏蔽 PHPStorm 的警告

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])
    && isset($_POST['password']) && isset($_POST['re_password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    if ($password !== $re_password) {
        $error = '两次输入的密码不一致';
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                alert('注册成功');
                location.href = 'login.php';
            </script>
            <?php
            exit;
        } else {
            $error = '注册失败';
        }
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
    <title>注册</title>
</head>
<body>
<div class="form-container">
    <h3>注册</h3>
    <form method="post">
        <label>
            <span>用户名</span>
            <input type="text" name="username" placeholder="请输入用户名" required>
        </label>
        <label>
            <span>密码</span>
            <input type="password" name="password" placeholder="请输入密码" required>
        </label>
        <label>
            <span>确认密码</span>
            <input type="password" name="re_password" placeholder="请再次输入密码" required>
        </label>
        <button type="submit">注册</button>
    </form>
    <?php if (isset($error)) {
        echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
    } ?>
    <a href="login.php">已有账号，登录</a>
</div>
</body>
</html>
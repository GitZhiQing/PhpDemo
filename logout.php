<?php
session_start();
session_destroy();
?>
    <script>
        alert('注销成功');
        document.location.href = 'login.php';
    </script>
<?php
exit;

<?php
session_start();

// Hủy tất cả các biến phiên
$_SESSION = array();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập hoặc bất kỳ trang nào khác sau khi đăng xuất
header("Location: ../index.php");
exit();
?>

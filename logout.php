<?php
    // Khởi động session
    session_start();

    // Xóa các biến session
    session_unset();

    // Hủy session
    session_destroy();

    // Chuyển hướng về trang chủ
    header('Location: login.php');
?>
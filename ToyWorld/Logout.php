<?php
    session_start();

    //unset hủy session
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    header("Location: ./TestHomePage.php");
?>
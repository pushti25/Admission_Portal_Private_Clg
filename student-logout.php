<?php
session_start();

// Unset only student session (safer)
if (isset($_SESSION['student'])) {
    unset($_SESSION['student']);
}

// Destroy session completely
session_destroy();

// Redirect to login page
header("Location: student-login.php");
exit();
?>
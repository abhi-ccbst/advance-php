<?php
if (isset($_COOKIE['logged_in_user'])) {
    // If user is logged in, redirect to the dashboard
    header("Location: dashboard.php");
    exit;
} else {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}
?>

<?php
setcookie('logged_in_user', '', time() - 3600, "/"); // Expire the cookie
header("Location: login.php");
exit;

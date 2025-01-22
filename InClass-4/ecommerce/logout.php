<?php
// Clear the user_id cookie
setcookie('user_id', '', time() - 3600, '/'); // Expire the cookie by setting a past time
setcookie('user_name', '', time() - 3600, '/'); // Expire the cookie by setting a past time

header('Location: login.php'); // Redirect to login page
exit;
?>

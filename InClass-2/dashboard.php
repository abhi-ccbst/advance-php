<?php
if (!isset($_COOKIE['logged_in_user'])) {
    header("Location: login.php");
    exit;
}
$username = $_COOKIE['logged_in_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Here’s some dummy data for your account:</p>
        <ul>
            <li>Account ID: 123456</li>
            <li>Email: <?php echo htmlspecialchars($username); ?>@example.com</li>
            <li>Subscription: Premium</li>
        </ul>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>

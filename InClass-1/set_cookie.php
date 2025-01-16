<?php
$cookie_name = "user";
$cookie_value = "Abhi Patel";
$expiry = time() + (86400 * 7); // 7 days from now

// Set the cookie
setcookie($cookie_name, $cookie_value, $expiry);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Cookie</title>
</head>
<body>
    <h1>Set Cookie</h1>
    <p>Cookie named <strong><?php echo $cookie_name; ?></strong> has been set with the value <strong><?php echo $cookie_value; ?></strong>.</p>
    <a href="index.php">Go Back</a>
</body>
</html>

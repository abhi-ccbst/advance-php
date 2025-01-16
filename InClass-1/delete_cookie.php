<?php
$cookie_name = "user";

// Delete the cookie
setcookie($cookie_name, "", time() - 3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Cookie</title>
</head>
<body>
    <h1>Delete Cookie</h1>
    <p>Cookie <strong><?php echo $cookie_name; ?></strong> has been deleted.</p>
    <a href="index.php">Go Back</a>
</body>
</html>

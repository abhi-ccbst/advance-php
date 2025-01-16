<?php
$cookie_name = "user";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Cookie</title>
</head>
<body>
    <h1>Get Cookie</h1>
    <?php if(isset($_COOKIE[$cookie_name])): ?>
        <p>Cookie <strong><?php echo $cookie_name; ?></strong> has the value: <strong><?php echo $_COOKIE[$cookie_name]; ?></strong></p>
    <?php else: ?>
        <p>Cookie <strong><?php echo $cookie_name; ?></strong> is not set.</p>
    <?php endif; ?>
    <a href="index.php">Go Back</a>
</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <?php 
        echo "<h3>Session Data:</h3>";
        print_r($_SESSION);
        $_SESSION["Name"] = "Abhi";
        $_SESSION["FavColor"] = "Navy Blue";
        echo "<br>" . $_SESSION["Name"] . "<br>";
        echo "Session variable are set.";
        echo "<h3>Session Data:</h3>";
        print_r($_SESSION);
        session_unset(); // Remove alll session variables
        session_destroy(); // destroy teh session
        ?>

    </body>
</html>
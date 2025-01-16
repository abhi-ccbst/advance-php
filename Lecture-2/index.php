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
        print "<br><br>";
        $xml = "<Customers>
    <customer>
        <id>1</id>
        <name>Alice</name>
        <city>New York</city>
        <Country>USA</Country>
    </customer>
    <customer>
        <id>2</id>
        <name>Bob</name>
        <city>Toronto</city>
        <Country>Canada</Country>
    </customer>
</Customers>";
        $convert_xml = simplexml_load_string($xml);
        if ($convert_xml === false) {
            echo "Failed to load XML <br>";
        } else{
            print_r($convert_xml);    
        }
        ?>

    </body>
</html>
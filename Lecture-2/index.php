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
            echo "<br>" . $convert_xml->customer[0]->name . "<br>";
            echo "<br>" . $convert_xml->customer[1]->city . "<br>";
            foreach ($convert_xml->children() as $customers) {
                echo $customers->id . ", " . $customers->name . ", " . $customers->city . ", " . $customers->Country . "<br>";
            }
        }
        ?>

    </body>
</html>
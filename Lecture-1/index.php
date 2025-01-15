<!-- 
The PHP date() function is used to format a date and/or a time.
date(format,timestamp)

d - Represents the day of the month (01 to 31)
m - Represents a month (01 to 12)
Y - Represents a year (in four digits)
l (lowercase 'L') - Represents the day of the week

H - 24-hour format of an hour (00 to 23)
h - 12-hour format of an hour with leading zeros (01 to 12)
i - Minutes with leading zeros (00 to 59)
s - Seconds with leading zeros (00 to 59)
a - Lowercase Ante meridiem and Post meridiem (am or pm)
 -->

<!DOCTYPE html>
<html>
    <body>
        <?php 
            echo "Today is " . date("Y/m/d") . "<br>";
            echo "Today is " . date("Y.m.d") . "<br>";
            echo "Today is " . date("Y-m-d") . "<br>";
            echo "Today is " . date("l") . "<br>";

            date_default_timezone_set("America/New_York");
            echo "The time is " . date("h:i:s a") . "<br>";

            echo "The time is " . date("Y-m-d h:i:s a") . "<br>";
// mktime(hour, minute, second, month, day, year)

            $d = mktime(11, 14, 54, 8, 12, 2025);
            echo "Created date is " . date("Y-m-d h:i:s a", $d) . "<br>";

            // The PHP strtotime() function is used to convert a human readable date string 
            // into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).
            $d = strtotime("10:30pm April 12 2025");
            echo "Created date is " . date("Y-m-d h:i:s a", $d) . "<br>";

            $d = strtotime("tomorrow");
            echo "Tomorrow date is " . date("Y-m-d h:i:s a", $d) . "<br>";

            $d = strtotime("next Monday");
            echo "Next monday date is " . date("Y-m-d h:i:s a", $d) . "<br>";


            $d = strtotime("+1 minutes");
            echo "+1 mintues date is " . date("Y-m-d h:i:s a", $d) . "<br>";

            $d1 = strtotime("+1 minutes", $d);
            while ($d1 > $d) {
                echo "date " . date("i s", $d) . "<br>";
                $d = strtotime("+10 seconds", $d);
            }



            // // setcookie(name, value, expire, path, domain, secure, httponly);
            $cookie_name = "userInfo";
            $cookie_value = "Abhi Patel";
            // 86400 = 1 Day = 86400 sec
            
            setcookie($cookie_name, $cookie_value, time() + (86400), "/");     
            if (!isset($_COOKIE[$cookie_name])) {
                echo "Cookie name " .$cookie_name ." is not set!";
            }else {
                echo "Cookie '" . $cookie_name . "' is set!<br>"; 
                echo "Value is: " . $_COOKIE[$cookie_name];     
                  
            }
        ?>
    </body>
</html>
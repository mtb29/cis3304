<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matt's Phone Number Finder</title>
    </head>
    <body>
        <h1>Matt's Phone Number Finder</h1>
        <form name="sourceForm" method="post" action="w9n2.php">
            <p>Text to scan:<br>
                <textarea name="source" rows="10" cols="40"><?php
                    if (!empty($_POST['source'])) {
                        $source = $_POST['source'];
                        echo "$source";
                    } else {
                        defaultSource();
                    }
                    ?></textarea>
            </p>
            <input type="submit" value="Find Phone Numbers">
        </form>
        <?php
        $arr = explode("\n", $source);
        $listing = array();
        $amt = 0;
        $lines = 0;


        echo "<h3>Scanner:</h3>";
        echo "<p>";
        for ($i = 0; $i < count($arr); $i++) {
            preg_match('/[0-9]{3}[\-][0-9]{6}|[0-9]{3}[\s][0-9]{6}|[0-9]{3}[\s][0-9]{3}[\s][0-9]{4}|[0-9]{9}|[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}/', $arr[$i], $matches);
            if (!empty($matches[0])) {
                echo "Line $i: [$arr[$i]] New phone number found: <b>$matches[0]</b></br>";
                $amt++;
            } else {
                echo "Line $i: [$arr[$i]] No phone number found.</br>";
            }
            $lines++;
            $listing[] = sprintf("%d: <b>%s</b>\n", $i, $matches[0]);
        }
        echo "</p>";
        echo "<h3>Phone Numbers:</h3>";
        echo "<pre>";
        foreach ($listing as $line) {

            if (strlen($line) > 14) {
                echo "Line $line";
            }
        }
        echo "</pre>";
        
        echo "<h3>Stats:</h3>";
        echo "<p>Found $amt phone numbers in $lines lines.</br>";
        echo "RegEx: /[0-9]{3}[\-][0-9]{6}|[0-9]{3}[\s][0-9]{6}|[0-9]{3}[\s][0-9]{3}[\s][0-9]{4}|[0-9]{9}|[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}/ (Are you kidding me?)</p>";
        ?>
    </body>
</html>

<?php

function defaultSource() {
    echo "Bobby Bob Bob 293-382-1939\n";
    echo "Jane 211-200-2001 Doe\n";
    echo "111 111 1111\n";
    echo "No phone number here\n";
    echo "Bobby Bob Bob Jr 293-382-1940\n";
    echo "123 456 7890\n";
    echo "123-456-7890\n";
    echo "Test\n";
    echo "There are no phone numbers here, stop looking!\n";
    echo "Test 2\n";
    echo "Text\n";
    echo "111-222-3333";
}

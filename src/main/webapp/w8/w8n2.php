<!DOCTYPE HTML>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>w8n2 String Calculator</title>
        <style type="text/css">
            body {
                background: #eeeeee;
                color: green;
                font-family: Tahoma, Geneva, sans-sarif;
                font-size: large;
                padding: 10px;
            }
            h1 {
                font-size: 24pt;
                font-style: normal;
                font-weight: bolder;
                font-varient: small-caps;
            }
    </style>
    </head>
    <body>
        <h1>Matt's Simple String Calculator</h1>
        <?php
            $Str1 = $_GET['str1'];
            $Str2 = $_GET['str2'];
            $Str3 = $_GET['str3'];
            echo "<p>String One: $Str1";
            echo "<br/>String Two: $Str2";
            echo "<br/>String Three: $Str3</p>";
            printf("<br/>The length of String One is: %d, String Two: %d, and String Three: %d. Their total length is: %d.\n", strlen($Str1), strlen($Str2), strlen($Str3), strlen($Str1) + strlen($Str2) + strlen($Str3));
        ?>  
    </body>
</html>


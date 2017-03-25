<!DOCTYPE HTML>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>w8n1 Interest Calculator</title>
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
        <h1>Matt's Simple Interest Calculator</h1>
        <?php
            $principle = $_GET['principle'];
            $rate = $_GET['rate'] / 100.0;
            $interest = $principle * $rate;
            echo "<p>Principle: $$principle";
            echo "<br/>Interest Rate: $rate";
            echo "<br/>Yearly Interest: $$interest</p>";
            echo "<p>We can also use printf to format the text";
            printf("<br/><br/>Investing $%1.2f at %1.4f%% results in a yearly interest of $%1.2f\n", $principle, $rate * 100, $interest);
        ?>  
    </body>
</html>


<html>
    <head>
        <title>Quiz Results</title>
    </head>
    <body>
        <form action="email.php" method="post">
            <?php
            $score = 0;
            $questioncount = $_POST['questioncount'];
            $results = "";

            for ($i = 0; $i < $questioncount; $i++) {
                if ($_POST['quess$i'] == $_POST['answer$i']) {
                    $score++;
                    //echo "$_POST['guess$i']";
                }
            }
            
            $results = "You got " . ($score) . " out of " . ($questioncount) . " correct!";
            echo "$results<br/><br/>";
            echo "<input type='hidden' name='results' value=\"$results\">";
            ?>
            Email: <input type="text" name="email" value="">
            <input type="submit" name="submit" value="Submit">
        </form>
        <a href='quizlist.php'><button>Home</button></a>
    </body>
</html>


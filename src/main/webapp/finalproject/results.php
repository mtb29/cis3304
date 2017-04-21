<html>
    <head>
        <title>Quiz Results</title>
    </head>
    <body>
        <form action="email.php" method="post">
            <?php
            $score = 0;
            $quiztype = $_POST['quiztype'];
            $questioncount = $_POST['questioncount'];

            for ($i = 1; $i <= $questioncount; $i++) {
                $guess = "guess" . $i;
                $guess = $_POST["$guess"];
                $guess = htmlspecialchars($guess);
                $answer = "answer" . $i;
                $answer = $_POST["$answer"];
                $answer = htmlspecialchars($answer);
                $answerletter = "answerletter" . $i;
                $answerletter = $_POST["$answerletter"];
                echo "Guess: $guess <br/>";
                echo "Answer: $answer <br/>";
                echo "Answer letter: $answerletter <br/>";
                if (strcasecmp($guess, $answer) == 0) {
                    $score++;
                }
                else if (strcasecmp($guess, $answerletter) == 0) {
                    $score++;
                }
            }

            $results = "You got " . ($score) . " out of " . ($questioncount) . " correct on the " . ($quiztype) . " quiz! (" . ($score / $questioncount * 100) . "%)";
            echo "<br/>$results<br/><br/>";
            echo "<input type='hidden' name='results' value=\"$results\">";
            ?>
            Email: <input type="text" name="email" value="">
            <br/>
            <br/>
            <input type="submit" name="submit" value="Submit">
        </form>
        <a href='quizlist.php'><button>Home</button></a>
    </body>
</html>


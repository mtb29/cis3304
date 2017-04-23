<html>
    <head>
        <title>Quiz</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <p><strong>Answers are case insensitive. You may answer by typing the letter or the answer.</strong></p>
        <form action="results.php" method="post">
            <?php
            if (empty($_GET['quizid']) || empty($_GET['quiztype']) || !is_numeric($_GET['quizid']) || $_GET['quizid'] < 1) {
                $quizid = 1;
                $quiztype = "mySQL";
            } else {
                $quizid = $_GET['quizid'];
                $quiztype = $_GET['quiztype'];
            }
            echo "<strong>$quiztype Quiz</strong>:<br/><br/>";
            $querystr = "SELECT * FROM quiz_questions WHERE quiz_type=" . ($quizid) . " ORDER BY RAND()";
            $count = 0;
            $answer[] = array();
            $answerletter = "";
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=quiz', 'mtb29', 'mucis');
                foreach ($dbh->query($querystr) as $row) {
                    $count++;
                    $question = $row[question];
                    $answer[$count] = htmlspecialchars($row[answer]);
                    $a1 = htmlspecialchars($row[a1]);
                    $a2 = htmlspecialchars($row[a2]);
                    $a3 = htmlspecialchars($row[a3]);

                    if ($answer[$count] == $a1) {
                        $answerletter = "A";
                    } else if ($answer[$count] == $a2) {
                        $answerletter = "B";
                    } else {
                        $answerletter = "C";
                    }
                    echo "$count: <strong>$question</strong><br/><br/>";
                    echo "A.&nbsp;&nbsp;&nbsp;&nbsp;$a1<br/>";
                    echo "B.&nbsp;&nbsp;&nbsp;&nbsp;$a2<br/>";

                    if (strlen($a3) > 0) {
                        echo "C.&nbsp;&nbsp;&nbsp;&nbsp;$a3<br/><br/><input type ='text' name=\"guess$count\" value=''><br/><br/>";
                    } else {
                        echo "<br/><input type ='text' name=\"guess$count\" value=''><br/><br/>";
                    }
                    echo "<input type='hidden' name='quiztype' value=\"$quiztype\">";
                    echo "<input type='hidden' name=\"answer$count\" value=\"$answer[$count]\">";
                    echo "<input type='hidden' name=\"answerletter$count\" value=\"$answerletter\">";
                }
                echo "<input type='hidden' name='questioncount' value=\"$count\">";
                $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            ?>
            <input type ="submit" name ="submit" value ="Submit">
        </form>
        <br/>
        <a href='quizlist.php'><button>Home</button></a>
    </body>
</html>

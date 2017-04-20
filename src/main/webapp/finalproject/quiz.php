<html>
    <head>
        <title>Quiz</title>
    </head>
    <body>
        <p><strong>Type the answer exactly as shown without the letter or copy & paste the answer.</strong></p>
        <br/>
        <form action="results.php" method="post">
            <?php
            if (empty($_GET['quizid']) || empty($_GET['quiztype']) || !is_numeric($_GET['quizid']) || $_GET['quizid'] < 1 || $_GET['quizid'] > 4) {
                $quizid = 1;
                $quiztype = "mySQL";
            } else {
                $quizid = $_GET['quizid'];
                $quiztype = $_GET['quiztype'];
            }
            echo "<strong>$quiztype Quiz</strong>:<br/><br/>";
            $querystr = "SELECT * FROM quiz_questions WHERE quiz_type=" . ($quizid);
            $count = 0;
            $answer[] = array();
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=mtb29', 'mtb29', 'mucis');
                foreach ($dbh->query($querystr) as $row) {
                    $count++;
                    $answer[$count] = $row[answer];
                    echo "Question $count: <strong>$row[question]</strong><br/><br/>";
                    echo "A. $row[a1]<br/>";
                    echo "B. $row[a2]<br/>";
                    echo "C. $row[a3]<br/><br/><input type ='text' name=\"guess$count\" value=''><br/><br/>";
                    echo "<input type='hidden' name='quiztype' value=\"$quiztype\">";
                    echo "<input type='hidden' name=\"answer$count\" value=\"$answer[$count]\">";
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

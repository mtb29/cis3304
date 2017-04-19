<html>
    <head>
        <title>Quiz</title>
    </head>
    <body>
        <?php
        if (empty($_GET['quizid']) || !is_numeric($_GET['quizid']) || $_GET['quizid'] < 1 || $_GET['quizid'] > 3) {
            $quizid = 1;
        } else {
            $quizid = $_GET['quizid'];
        }
        $querystr = "SELECT * FROM quiz_questions WHERE quiz_type=" . ($quizid);
        try {
            $count = 0;
            $dbh = new PDO('mysql:host=localhost;dbname=mtb29', 'mtb29', 'mucis');
            foreach ($dbh->query($querystr) as $row) {
                $count++;
                $answer[$count] = $row[answer];
                echo "Question $count: <strong>$row[question]</strong><br/><br/>";
                echo "A. $row[a1]<br/>";
                echo "B. $row[a2]<br/>";
                echo "C. $row[a3]<br/><br/>";
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
        <form action = "results.php" method = "post">
            <input type = "text" name = "test" value = "">
            <input type = "submit" name = "submit" value = "Submit">
        </form>
    </body>
</html>

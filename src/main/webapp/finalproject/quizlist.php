<html>
    <head>
        <title>Quiz List</title>
    </head>
    <body>
        <h1>Matt's Quiz List</h1>
        <?php
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=quiz', 'mtb29', 'mucis');

            foreach ($dbh->query('SELECT * FROM quiz_types') as $row) {
                echo "Quiz $row[id]: <a href='quiz.php?quizid=$row[id]&quiztype=$row[quiz_type]'>$row[quiz_type]</a><br/><br/>";
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        ?> 
    </body>
</html>

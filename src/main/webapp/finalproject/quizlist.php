<html>
    <head>
        <title>Quiz List</title>
    </head>
    <body>
        <h1>Matt's Quiz List</h1>
        <?php
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=mtb29', 'mtb29', 'mucis');
            foreach ($dbh->query('SELECT * from quiz_types') as $row) {
                echo "$row[id] - $row[quiz_type]<br/>\n";
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        ?> 
    </body>
</html>

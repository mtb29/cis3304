<html>
    <head>
        <title>Book List</title>
    </head>
    <body>
        <h1>Matt's Classic Book List</h1>
        <?php
            $db = new PDO('mysql:host=localhost;dbname=bradymt29;charset=utf8', 'bradymt29', 'bradymt29');
            $q = "SELECT id, author, title, type, year FROM classics ORDER BY type";
            
            foreach($db->query($q) as $row) {
                echo "$row[id], $row[author], $row[title], $row[type], $row[year]</br>\n";
            }
        ?>
    </body>
</html>

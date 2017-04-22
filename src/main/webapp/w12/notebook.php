<?php
// notebook.php by John Phillips and Matthew Brady on 4/21/2017
// A simple PHP program to store and retrieve poems from a MySQL database table.
// 
// database connection values -- replace these with your values
$DB_NAME = 'bradymt29';
$DB_USER = 'bradymt29';
$DB_PASSWORD = 'bradymt29';

// set variable default values
$order = 'Date-Descending';
$n = 3;

// retrieve session variables
if (isset($_REQUEST['order']) && isset($_REQUEST['n'])) {

// we will later sanitize $order with a switch statement before using it in a query
    $order = $_REQUEST['order'];

// this regular expression makes sure that $n contains only digits
// it replaces anything that is not a number with '' (empty string)
    $n = preg_replace('/[^0-9]/', '', $_REQUEST['n']);
}

// start the HTML document; display a heading and a control panel
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Matt's Poetry Notebook</title>
        <link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
        <header>
            <h1>Matt's Poetry Notebook</h1>
        </header>

        <form method="post" name="goForm">
            <div class="controls">
                <select name='order'>
                    <option <?= "Date-Ascending" == $order ? "selected>" : ">"; ?>Date-Ascending</option>
                    <option <?= "Date-Descending" == $order ? "selected>" : ">"; ?>Date-Descending</option>
                    <option <?= "ID" == $order ? "selected>" : ">"; ?>ID</option>
                </select>
                <input type='text' name='n' size='3' maxlength='5' value='<?= $n ?>'>
                <input type="submit" name="update" value="Update">
            </div>
        </form>

        <?php
// connect to database
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }

// if submit has been pressed then get the new poem and insert it
// into the notebook database table
        if (isset($_POST['submit'])) {

            $message = "";
            if (isset($_POST['message']) && strlen($_POST['message']) > 0) {

// get the message and filter out possible hacking code
                $message = $_POST['message'];
                $message = trim($message);
                $message = stripslashes($message);
                $message = htmlspecialchars($message);
                
// replace all newlines with break tags
                $message = preg_replace('/\n/', '<br/>', $message);

// execute SQL insert statement 
// - parameterized prepared statement prevents sql injection attacks
// - try/catch block to catch and display any sql errors
                try {
                    $q = "insert into notebook (id, posted, message) values(null, null, ?)";
                    $stmt = $dbh->prepare($q);
                    $stmt->bindParam(1, $message);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "<p>Error!: " . $e->getMessage() . "</p>\n";
                }
            } else {
                echo "<p class='large'>Poem is missing. Please try again.</p>\n";
            }
        }

// build up the SQL query to retrieve the poems from the database
// use ORDER BY to sort 
// use LIMIT to limit the number of rows returned by the query
        $q = "select id, posted, message from notebook";
        switch ($order) {
            case "Date-Ascending":
                $q .= " ORDER BY posted";
                break;
            case "Date-Descending":
                $q .= " ORDER BY posted DESC";
                break;
            case "ID":
                $q .= " ORDER BY id";
                break;
            default:
                $q .= " ORDER BY id";
        }
        $q .= " LIMIT $n";

// prepare and execute the SQL query
        $sth = $dbh->prepare($q);
        $sth->execute();

// retrieve and display the results
        foreach ($sth->fetchAll() as $row) {
            echo "<div class='rowid'>$row[id]: $row[posted]</div>\n";
            echo "<div class='message'>$row[message]</div>\n";
        }

// display a form for adding new poems
        ?>
        <h1>Add New Poem</h1>
        <form name="notebook" method="post">
            <textarea name="message"></textarea>
            <br>
            <input type="submit" name="submit" value="Submit Poem">
            <input type='hidden' name='order' value='<?= $order ?>'>
            <input type='hidden' name='n' value='<?= $n ?>'>
        </form>

        <footer>
            Poetry Notebook by John Phillips and Matthew Brady is licensed under a 
            <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">
                Creative Commons Attribution 4.0 International License</a>.

            <br>This web site has been 
            <a href='http://validator.w3.org/check/referer'>W3C HTML Validated</a>
            and
            <a href="http://jigsaw.w3.org/css-validator/check/referer">W3C CSS Validated</a>
        </footer>

    </body>
</html>


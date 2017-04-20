<html>
    <head>
        <title>Email Quiz Results</title>
    </head>
    <body>
        <?php
        $email = $_POST['email'];
        $results = $_POST['results'];
        preg_match('\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b', $email, $matches);

        if (empty($email) || empty($matches[0])) {
            echo "You have entered an invalid email address. Go back and try again.";
        } else {
            mail($email, 'Quiz Results', $results);
            echo "The results have been sent to $email.<br/>";
        }
        ?>
        <a href="quizlist.php"><button>Home</button></a>
    </body>
</html>

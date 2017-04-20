<html>
    <head>
        <title>Email Quiz Results</title>
    </head>
    <body>
        <?php
        $email = $_POST['email'];
        $results = $_POST['results'];

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "You have entered an invalid email address. Go back and try again.<br/>";
        } else {
            mail($email, 'Quiz Results', $results);
            echo "The results have been sent to $email.<br/>";
        }
        ?>
        <a href="quizlist.php"><button>Home</button></a>
    </body>
</html>

<html>
    <head>
        <title>Email Quiz Results</title>
    </head>
    <body>
        <?php
        if (mail($_POST['email'], 'Quiz Results', $_POST['results'])) {
            echo 'The results have been sent to your email.<br/>';
        } else {
            echo 'You entered an invalid email.<br/><br/>';
        }
        ?>
        <a href='quizlist.php'><button>Home</button></a>
    </body>
</html>

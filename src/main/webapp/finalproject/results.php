<html>
    <head>
        <title>Quiz Results</title>
    </head>
    <body>
        <form action="email.php" method="post">
            <p>Your quiz results: <?php echo $_POST['test']; ?><br/></p> 
            Email: <input type="text" name="email" value="">
            <input type="submit" name="submit" value="Submit">
            <input type="hidden" name="results" value="<?php echo $_POST['test'] ?>">
        </form>
    </body>
</html>


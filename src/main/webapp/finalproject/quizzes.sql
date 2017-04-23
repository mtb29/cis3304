DROP DATABASE IF EXISTS quiz;

CREATE DATABASE quiz;

USE quiz;

DROP TABLE IF EXISTS quiz_types;

CREATE TABLE quiz_types (
    id INT NOT NULL AUTO_INCREMENT,
    quiz_type VARCHAR(24) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO quiz_types (quiz_type) VALUES ('mySQL'), ('HTML'), ('PHP'), ('Math'), ('Puppies/Dogs'), ('Science True/False');

DROP TABLE IF EXISTS quiz_questions;

CREATE TABLE quiz_questions (
    id INT NOT NULL AUTO_INCREMENT,
    quiz_type VARCHAR(24) NOT NULL,
    question VARCHAR(128) NOT NULL,
    a1 VARCHAR(128) NOT NULL,
    a2 VARCHAR(128) NOT NULL,
    a3 VARCHAR(128) NULL,
    answer VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO quiz_questions (quiz_type, question, a1, a2, a3, answer) VALUES 
    (1, 'What does SQL in mySQL stand for?', 'Squirrel Query Language', 'Structured Query Language', 'Soothing Quiet Loops', 'Structured Query Language'),
    (1, 'How do you select all rows of a table?', 'SELECT ALL FROM Table_Name', 'VIEW ALL ROWS IN Table_Name', 'SELECT * FROM Table_Name', 'SELECT * FROM Table_Name'),
    (1, 'How do you view all of the tables in a specific database?', 'VIEW ALL TABLES', 'SHOW TABLES', 'OPEN SESAME', 'SHOW TABLES'),
    (1, 'How do you sort results in descending order?', 'SORT BY DESC', 'ORDER BY DESC', 'DISPLAY DESCENDING', 'ORDER BY DESC'),
    (1, 'What is the operator in the WHERE clause to find similar results?', 'SIMILAR', 'MATCH', 'LIKE', 'LIKE'),
    (1, 'Which statement would display the amount of rows in a given table?', 'SELECT COUNT(*) FROM Table_Name', 'SELECT NUMROWS(*) FROM Table_Name', 'COUNT ROWS IN Table_Name', 'SELECT COUNT(*) FROM Table_Name'),
    (2, 'What does HTML stand for?', 'HyperText Markup Language', 'Hosted Typebased Marking Language', 'Hyper Typing Matching Language', 'HyperText Markup Language'),
    (2, 'How do you insert a line break in HTML?', '<br/>', '&nbsp;', 'Empty Line', '<br/>'),
    (2, 'The latest version of HTML is?', 'HTML4', 'HTML_Super', 'HTML5', 'HTML5'),
    (2, 'To style elements in an HTML page, you would use?', 'CHS', 'CSS', 'CBS', 'CSS'),
    (2, 'How do you link to another webpage in HTML?', '<a href=url></a>', '<url=url></url>', '<link url=url></link>', '<a href=url></a>'),
    (3, 'What does PHP stand for?', 'PHP: Hypertext Preprocessor', 'Plus HTML Plus', 'Purple Horses Plowing', 'PHP: Hypertext Preprocessor'),
    (3, 'What does a block of PHP code look like?', '<php></php>', '<?php ?>', '!!PHP < >', '<?php ?>'),
    (3, 'How do you make a multi-line comment in PHP?', '/* comment */', '!!PHP Comment: comment', '// comment', '/* comment */'),
    (3, 'How do you create an array in PHP?', '$variable = array();', '!!PHP Array:', '$array($variable);', '$variable = array();'),
    (4, 'How much is 2 + 2?', 'Fish', 'Four', 'Seven', 'Four'),
    (4, 'What is the square root of 9?', 'One', 'Two', 'Three', 'Three'),
    (4, 'What is the answer to life, the universe, and everything?', '42', '69', '01001110 01000101 01010010 01000100 00100001', '42'),
    (4, 'A 20% tip on a $42.36 bill is?', '$8.47', '$0.00', '$9.47', '$8.47'),
    (4, 'How much interest is 12% APR on a $3600 loan after one year?', '$336', '$432', '$523', '$432'),
    (4, 'In the equation: X + 1 - 1 = 4 - 1, what does X equal?', '3', '-1', '0', '3'),
    (5, 'At what age are you able to take a puppy home?', '8 weeks', '9 weeks', '10 weeks', '8 weeks'),
    (5, 'Who is mans best friend?', 'Cat', 'Zebra', 'Dog', 'Dog'),
    (5, 'Of the three, what is the most popular dog name?', 'Fido', 'Ralph', 'George', 'Fido'),
    (5, 'Dogs develop their sense of smell at what age?', '1 month', '3 weeks', '1 day', '3 weeks'),
    (5, 'Of the three, which is an actual breed of dog?', 'ShihTzu', 'Kazuul', 'Snioooper', 'ShihTzu'),
    (5, 'What dog breed is Lassie?', 'Golden Retriever', 'Collie', 'Australian Shepherd', 'Collie'),
    (5, 'What dog breed is Scooby Doo?', 'Great Dane', 'Saint Bernard', 'Poodle', 'Great Dane'),
    (5, 'In Scooby Doo 2 Monsters Unleashed, Scooby Doo comes to a conclusion, which is?', 'Yoinks!', 'Great Scott!', 'Bunny!', 'Bunny!'),
    (6, 'A full moon happens when Earth is between the Sun and the Moon?', 'True', 'False', '', 'True'),
    (6, 'Aluminium is great at conducting heat?', 'True', 'False', '', 'True'),
    (6, 'During photosynthesis, plants make glucose and carbon dioxide?', 'True', 'False', '', 'False'),
    (6, 'NA is the chemical symbol for calcium?', 'True', 'False', '', 'False'),
    (6, 'Water boils at 100 degrees celcius?', 'True', 'False', '', 'True'),
    (6, 'Nitrogen is the most abundant gas in the Earths atmosphere?', 'True', 'False', '', 'True'),
    (6, 'The cornea of your eye is where the light receptors are?', 'True', 'False', '', 'False'),
    (6, 'Arteries carry blood towards the heart?', 'True', 'False', '', 'False'),
    (6, 'Igneous rocks are produced when magma hardens?', 'True', 'False', '', 'True'),
    (6, 'The mitochondria is a type of organelle?', 'True', 'False', '', 'True');

    

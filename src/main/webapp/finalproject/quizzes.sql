DROP DATABASE IF EXISTS mtb29;

CREATE DATABASE mtb29;

USE mtb29;

DROP TABLE IF EXISTS quiz_types;

CREATE TABLE quiz_types (
    id INT NOT NULL AUTO_INCREMENT,
    quiz_type VARCHAR(24) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO quiz_types (quiz_type) VALUES ('mySQL'), ('HTML'), ('PHP');

DROP TABLE IF EXISTS quiz_questions;

CREATE TABLE quiz_questions (
    id INT NOT NULL AUTO_INCREMENT,
    quiz_type VARCHAR(24) NOT NULL,
    question VARCHAR(128) NOT NULL,
    a1 VARCHAR(128) NOT NULL,
    a2 VARCHAR(128) NOT NULL,
    a3 VARCHAR(128) NOT NULL,
    answer VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO quiz_questions (quiz_type, question, a1, a2, a3, answer) VALUES 
    (1, 'What does SQL in mySQL stand for?', 'Squirrel Query Language', 'Structured Query Language', 'Soothing Quiet Loops', 'Structured Query Language'),
    (1, 'How do you select all rows of a table?', 'SELECT ALL FROM Table_Name', 'VIEW ALL ROWS IN Table_Name', 'SELECT * FROM Table_Name', 'SELECT * FROM Table_Name'),
    (1, 'How do you view all of the tables in a specific database?', 'VIEW ALL TABLES', 'SHOW TABLES', 'OPEN SESAME', 'SHOW TABLES'),
    (2, 'What does HTML stand for?', 'HyperText Markup Language', 'Hosted Typebased Marking Language', 'Hyper Typing Matching Language', 'HyperText Markup Language'),
    (2, 'How do you insert a line break in HTML?', '&lt;br/&gt;', '&amp;nbsp', 'Empty Line', '&lt;br/&gt;'),
    (2, 'The latest version of HTML is?', 'HTML4', 'HTML_Super', 'HTML5', 'HTML5'),
    (3, 'What does PHP stand for?', 'PHP: Hypertext Preprocessor', 'Plus HTML Plus', 'Purple Horses Plowing', 'PHP: Hypertext Preprocessor'),
    (3, 'What does a block of PHP code look like?', '&lt;php&gt;&lt;/php&gt;', '&lt;?php ?&gt;', '!!PHP &lt; &gt;', '&lt;?php ?&gt;'),
    (3, 'How do you make a multi-line comment in PHP?', '/* comment */', '!!PHP Comment: comment', '//', '/* comment */');
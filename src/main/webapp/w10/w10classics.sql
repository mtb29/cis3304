USE bradymt29;

DROP TABLE IF EXISTS classics;
CREATE TABLE classics (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(128),
    title VARCHAR(128),
    type VARCHAR(16),
    year CHAR(4)
);

INSERT INTO classics VALUES (NULL, 'Mark Twain', 'The Adventures of Tom Sawyer', 'Fiction', '1876');
INSERT INTO classics VALUES (NULL, 'Jane Austin', 'Pride and Prejudice', 'Fiction', '1811');
INSERT INTO classics VALUES (NULL, 'Charles Darwin', 'The Origin of Species', 'Non-Fiction', '1856');
INSERT INTO classics VALUES (NULL, 'William Shakespeare', 'Romeo and Juliet', 'Play', '1594');
INSERT INTO classics VALUES (NULL, 'Lois Lowry', 'The Giver', 'Fiction', '1993');
INSERT INTO classics VALUES (NULL, 'Margaret Atwood', 'Oryx and Crake', 'Fiction', '2003');
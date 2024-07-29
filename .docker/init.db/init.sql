--
-- SQL Script
-- See .env to accord database name, user_name and password
--

CREATE DATABASE IF NOT EXISTS web-repository;

USE web-repository;

DROP TABLE IF EXISTS web-repository.author;
CREATE TABLE web-repository.author (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(45) NOT NULL,
    firstname VARCHAR(30),
    nickname VARCHAR(45) NOT NULL,
    UNIQUE (nickname)
);

DROP TABLE IF EXISTS web-repository.post;
CREATE TABLE web-repository.post (
    id INT AUTO_INCREMENT PRIMARY KEY,
    created_at DATE NOT NULL,
    title VARCHAR(150) NOT NULL,
    subtitle VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NOT NULL
    FOREIGN KEY (author_id) REFERENCES author(id)
);

INSERT INTO web-repository.author (lastname, firstname, nickname) VALUES
    ('Lambert', 'Gérard', 'glambert'),
    ('Vicente', 'Andrea', 'elcapitan');

INSERT INTO web-repository.post (created_at, title, subtitle, content, author_id) VALUES 
    ('2024-07-29', 'First post', 'Init db', 'Displaying posts', 1),
    ('2024-07-28', 'Les JO', 'Le village Olympique', 'Des athlètes', 1),
    ('2024-07-28', 'PHP', 'Personal Home Page', 'Programming language', 2);

CREATE USER 'web_db_user'@localhost IDENTIFIED BY 'web_db_password';
CREATE USER 'web_db_user'@'%' IDENTIFIED BY 'web_db_password';

GRANT ALL PRIVILEGES ON `web-repository`.* TO 'web_db_user'@'localhost';
GRANT ALL PRIVILEGES ON `web-repository`.* TO 'web_db_user'@'%';

FLUSH PRIVILEGES;
CREATE DATABASE IF NOT EXISTS ccbst;

USE ccbst;
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert a test user
INSERT INTO users (username, password)
VALUES ('user123', ('pass123'));
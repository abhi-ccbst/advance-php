DROP DATABASE IF EXISTS ccbst;
CREATE DATABASE ccbst;

USE ccbst;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

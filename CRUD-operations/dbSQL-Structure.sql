CREATE DATABASE Eduarte_DB;

USE Eduarte_DB;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    email VARCHAR(100)
);
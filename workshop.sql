CREATE DATABASE IF NOT EXISTS dance_workshop;

USE dance_workshop;

CREATE TABLE IF NOT EXISTS participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Database creation script for NiceAdmin Class Registration System

-- Create database
CREATE DATABASE IF NOT EXISTS niceadmin;

-- Use the database
USE niceadmin;

-- Create table for class registrations
CREATE TABLE IF NOT EXISTS class_registrations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    middleName VARCHAR(50),
    lastName VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    studentEmail VARCHAR(100) NOT NULL,
    studentId VARCHAR(50) NOT NULL,
    classes VARCHAR(50) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: Insert sample data (uncomment to use)
-- INSERT INTO class_registrations (firstName, middleName, lastName, gender, studentEmail, studentId, classes) VALUES
-- ('John', 'Doe', 'Smith', 'male', 'john@example.com', '12345', 'math'),
-- ('Jane', '', 'Doe', 'female', 'jane@example.com', '67890', 'science');

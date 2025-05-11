-- database_setup.sql
-- Create the database
CREATE DATABASE IF NOT EXISTS database_setup;
USE database_setup;

-- Create users table
CREATE TABLE users (
    users_id INT AUTO_INCREMENT PRIMARY KEY,
    users_uid VARCHAR(255) NOT NULL,
    users_pwd VARCHAR(255) NOT NULL,
    users_email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_uid (users_uid),
    UNIQUE KEY unique_email (users_email)
);

-- Create profiles table
CREATE TABLE profiles (
    profiles_id INT AUTO_INCREMENT PRIMARY KEY,
    profiles_about TEXT,
    profiles_introtitle VARCHAR(255),
    profiles_introtext TEXT,
    users_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(users_id) ON DELETE CASCADE
);

-- Insert some sample data (optional)
-- INSERT INTO users (users_uid, users_pwd, users_email) VALUES 
-- ('admin', '$2y$10$9ZbTMnMlRFPy9pqtmzrGpOWFrNEFvGRNQG9FG.5cTxBuEyxzAyKIy', 'admin@example.com');

-- The password hash above is for 'password123' - you should change this!

-- Show tables
SHOW TABLES;

-- Show structure of tables
DESCRIBE users;
DESCRIBE profiles;
CREATE DATABASE IF NOT EXISTS Login_System;

USE Login_System;

CREATE TABLE IF NOT EXISTS users (
    usersId INT AUTO_INCREMENT PRIMARY KEY,
    usersName VARCHAR(255) NOT NULL,
    usersEmail VARCHAR(255) UNIQUE NOT NULL,
    usersUid VARCHAR(255) UNIQUE NOT NULL,
    usersPwd VARCHAR(255) NOT NULL
);
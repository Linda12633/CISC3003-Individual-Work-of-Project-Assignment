<?php

class Dbh {
    protected function connect() {
        try {
            // Database connection configuration
            $username = "root";  // Replace with your database username
            $password = "";      // Replace with your database password
            $host = "localhost";
            $dbname = "auth_system";
            
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $pdo = new PDO($dsn, $username, $password);
            
            // Set PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return $pdo;
        } catch(PDOException $e) {
            // Print error message and terminate
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

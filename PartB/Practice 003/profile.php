<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/Database.php";
require_once "classes/User.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->getUserById($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?= htmlspecialchars($user->full_name) ?>!</h2>
        <p><strong>Username:</strong> <?= htmlspecialchars($user->username) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user->email) ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
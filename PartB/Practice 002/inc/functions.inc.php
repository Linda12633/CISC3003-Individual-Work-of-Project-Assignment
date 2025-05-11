<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result = false;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    return $result;
}


function invalidUid($username) {
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    return $result;
}


function invalidEmail($email) {
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}


function pwdMatch($pwd, $pwdRepeat) {
    $result = false;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    // Consider using PASSWORD_ARGON2ID for stronger security if PHP 7.3+
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=executionfailed");
        exit();
    }
    
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd) {
    $result = false;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
    
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    // Start session and set session variables
    session_start();
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["username"] = $uidExists["usersUid"];
    
    // Consider adding more user info to session if needed
    // $_SESSION["useremail"] = $uidExists["usersEmail"];
    // $_SESSION["userfullname"] = $uidExists["usersName"];
    
    header("location: ../index.php");
    exit();
}
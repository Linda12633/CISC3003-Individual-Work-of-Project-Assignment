<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if (isset($_POST['reset-request-submit'])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    
    $url = "http://localhost/CISC3003-ProjectAssignment-IndividualWork-DC226696/PartB/Practice05/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;
    
    require 'dbh.inc.php';
    
    $userEmail = $_POST["email"];
    
    // Database operations...
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // Email sending
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->SMTPDebug = 0; // Disable debug output for production
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'opchitc@gmail.com';
        $mail->Password = 'yyfymzkmnmvagwta';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        // Important: Add these options
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        // Recipients
        $mail->setFrom('opchitc@gmail.com', 'Password Reset');
        $mail->addAddress($userEmail);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset your password';
        $mail->Body = '<p>We received a password reset request. The link to reset your password is below. ';
        $mail->Body .= 'If you did not make this request, you can ignore this email</p>';
        $mail->Body .= '<p>Here is your password reset link: </br>';
        $mail->Body .= '<a href="' . $url . '">' . $url . '</a></p>';
        
        $mail->send();
        header("Location: ../reset-password.php?reset=success");
        exit();
    } catch (Exception $e) {
        // Log error for debugging
        error_log("Mailer Error: " . $mail->ErrorInfo);
        header("Location: ../reset-password.php?reset=error");
        exit();
    }
} else {
    header("Location: ../signup.php");
    exit();
}
?>
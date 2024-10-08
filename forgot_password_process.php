<?php
session_start();
include 'db.php';

// Fetch the email value
$email = $_POST['email'];

// Validate email format
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    die('Invalid email format');
}

// Protect against SQL injection
$email = $conn->real_escape_string($email);

// Check if the email exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Generate a random token
    $token = bin2hex(random_bytes(50));

    // Insert the token into the database
    $sql = "UPDATE users SET reset_token='$token', reset_requested_at=NOW() WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        // Send reset email
        $resetLink = "https://directory.etsakoclub81.org/reset_password.php?token=" . $token;
        $subject = "Password Reset Request";
        $message = "Click on the following link to reset your password: " . $resetLink;
        $headers = "From: no-reply@etsakoclub81.org";

        if (mail($email, $subject, $message, $headers)) {
            // Redirect to confirmation page
            header("Location: password_reset_confirmation.php");
            exit();
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Failed to update database: " . $conn->error;
    }
} else {
    echo "No user found with this email address.";
}

$conn->close();
?>

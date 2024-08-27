<?php
ob_start(); // Start output buffering

include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Fetch the token from the URL
$token = $_GET['token'] ?? '';

// Protect against SQL injection
$token = $conn->real_escape_string($token);

// Check if the token is valid in the `users` table
$sql = "SELECT email FROM users WHERE reset_token='$token' AND reset_requested_at > NOW() - INTERVAL 1 HOUR";
$result = $conn->query($sql);
$userEmail = '';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userEmail = $row['email']; // Get the email associated with the token
} else {
    // Check if the token is valid in the `members` table
    $sql = "SELECT email FROM members WHERE reset_token='$token' AND reset_requested_at > NOW() - INTERVAL 1 HOUR";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userEmail = $row['email']; // Get the email associated with the token
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/reset_password.css">
    <title>Reset Password</title>
</head>
<body>
    <?php include 'includes/header.php'; ?> <!-- Include the header -->

    <div class="content">
        <?php
        if (!empty($userEmail)) {
            // Token is valid, show reset password form
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($newPassword == $confirmPassword) {
                    // Hash the new password using password_hash for better security
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Update the password in the `users` table
                    $sql = "UPDATE users SET password='$hashedPassword', reset_token=NULL, reset_requested_at=NULL WHERE email='$userEmail'";
                    $usersUpdated = $conn->query($sql);

                    // Update the password in the `members` table
                    $sql = "UPDATE members SET password='$hashedPassword', reset_token=NULL, reset_requested_at=NULL WHERE email='$userEmail'";
                    $membersUpdated = $conn->query($sql);

                    // Check if either table was updated
                    if ($usersUpdated || $membersUpdated) {
                        // Redirect to the password reset success page
                        header("Location: password_reset_success.php");
                        exit();
                    } else {
                        echo "No rows were affected. The token might not be correct or might have already been used.";
                    }
                } else {
                    echo "Passwords do not match.";
                }
            } else {
                // Show the reset password form
                ?>
                <div class="form-header">
                    Reset Password
                </div>
                <form method="post" action="">
                    <label for="new_password" class="form-label">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="form-input" required>
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-input" required>
                    <button type="submit" class="form-button">Reset Password</button>
                </form>
                <?php
            }
        } else {
            // Token is invalid or expired
            echo "<div class='form-header'>Invalid or expired token.</div>";
        }
        ?>
    </div>

    <?php include 'includes/footer.php'; ?> <!-- Include the footer -->
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>

<?php
$conn->close();
ob_end_flush(); // Flush the output buffer and send output to the browser
?>

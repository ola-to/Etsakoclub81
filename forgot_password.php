<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/forgot_password.css">
    <title>Forget password</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="subheader"></div>
    <div class="content">
        <div class="form-header">
            Forgot Password
        </div>
        <form method="post" action="forgot_password_process.php">
            <label for="email" class="form-label">Enter your email address:</label>
            <input type="email" id="email" name="email" class="form-input" required><br><br>
            <button type="submit" class="form-button">Submit</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>

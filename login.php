<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login Page</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="subheader"></div>
    <div class="content">
        <div class="form-header">
            Sign in to Etsakoclub81
        </div>
        <form method="post" action="submit_login.php">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-input" required><br><br>
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-input" required><br><br>
            <button type="submit" class="form-button">Login</button>
        </form>
        <div class="form-footer">
            <a href="https://directory.etsakoclub81.org/forgot_password.html">Forgot your Password?</a><br>
            <a href="https://directory.etsakoclub81.org/register.html">Not a Etsakoclub81 Member? Sign Up</a>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>
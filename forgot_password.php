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
    <div class="header">
        <a href="#" class="logo">
            <img src="ets.png" alt="Logo">
        </a>
        <div class="search-box">
            <input type="text" id="search-input" placeholder="Search....">
            <button id="search-button" style="background-color: green; color: white;" onclick="performSearch()">🔍</button>
        </div>
        <div class="business-links">
            <a href="https://directory.etsakoclub81.org">Home</a>
            <a href="https://directory.etsakoclub81.org/register.html">Register</a>
            <a href="https://directory.etsakoclub81.org/login.html">Login</a>
            <a href="https://directory.etsakoclub81.org">Back to Main Website</a>
        </div>
    </div>
    <div class="mobile-header">
        <div class="mobile-search-box">
            <input type="text" placeholder="" aria-label="Search">
        </div>
        <a href="#" class="logo">
            <img src="ets.png" alt="Logo">
        </a>
        <button class="menu-icon" onclick="openPopup()">☰</button>
    </div>
    <div class="searchm-box">
            <input type="text" id="search-input" placeholder="Search... 🔍">
            <button id="search-button" style="background-color: green; color: white;" onclick="performSearch()">🔍</button>
        </div>
    <div class="popup" id="menuPopup">
        <div class="popup-content">
            <a href="https://directory.etsakoclub81.org">Home</a>
            <a href="https://directory.etsakoclub81.org/register.html">Register</a>
            <a href="https://directory.etsakoclub81.org/login.html">Login</a>
            <a href="https://directory.etsakoclub81.org">Back to Main Website</a>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>
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
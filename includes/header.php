<!-- header.php -->
<div class="header">
    <a href="#" class="logo">
        <img src="assets/images/ets.png" alt="Logo">
    </a>
    <div class="search-box">
        <input type="text" id="search-input" placeholder="Search....">
        <button id="search-button" style="background-color: green; color: white;" onclick="performSearch()">🔍</button>
    </div>
    <div class="business-links">
        <a href="https://directory.etsakoclub81.org">Home</a>
        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php endif; ?>
        <a href="https://etsakoclub81.org">Back to Main Website</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </div>
</div>
<div class="mobile-header">
    <div class="mobile-search-box">
        <input type="text" placeholder="" aria-label="Search">
    </div>
    <a href="#" class="logo">
        <img src="assets/images/ets.png" alt="Logo">
    </a>
    <button class="menu-icon" onclick="openPopup()">☰</button>
</div>
<div class="searchm-box">
    <input type="text" id="search-input" placeholder="Search... 🔍">
    <button id="search-button" style="background-color: green; color: white;" onclick="performSearch()">🔍</button>
</div>
<div class="popup" id="menuPopup">
    <div class="popup-content">
        <a href="index.php">Home</a>
        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php endif; ?>
        <a href="https://etsakoclub81.org">Back to Main Website</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>
</div>

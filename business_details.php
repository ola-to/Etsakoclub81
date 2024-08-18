<?php
include 'db.php';

// Fetch user ID from URL
$userId = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch user data based on ID
$sql = "SELECT * FROM members WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

$conn->close();

// Helper function to safely display data
function safe_output($data) {
    return htmlspecialchars($data ?? '');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title><?php echo safe_output($user['business_type']); ?> - Details</title>
    <style>
        body {
            font-family: 'Lato', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header, .mobile-header {
            display: flex;
            align-items: center;
            padding: 10px;
            color: white;
            width: 100%;
        }
        .header {
            background-color: white;
            justify-content: space-between;
        }
        .mobile-header {
            background-color: white;
            justify-content: space-between;
            position: relative;
        }
        .logo {
            width: 150px;
            height: 50px;
            margin-right: 10px;
            margin-top: 15px;
            margin-left: 30px;
        }
        .logo img {
            width: 100%;
            height: auto;
        }
        .search-box {
            display: flex;
            align-items: right;
            margin-right: auto;
            margin-left: 60px;
        }
        #search-input, #search-button {
            height: 40px;
            line-height: 40px;
            font-size: 16px;
            padding: 0 10px;
        }
        #search-input {
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 5px 0 0 5px;
            box-sizing: border-box;
        }
        #search-button {
            border: 1px solid #ccc;
            background-color: #944b1e;
            color: white;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
            border-left: none;
            box-sizing: border-box;
        }
        .business-links {
            display: flex;
            align-items: center;
        }
        .business-links a {
            margin-right: 40px;
            text-decoration: none;
            color: black;
            text-align: center;
            font-size: 14px;
        }
        .content-wrapper {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1;
        }
        .sidebar {
            padding: 20px;
            background-color: white;
            border: 1px solid lightgrey;
            margin-right: 20px;
        }
        .content {
            padding: 20px;
            flex: 3;
            margin: 0 20px;
            background-color: white;
        }
        .footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
            margin-top: auto;
        }
        .business-details {
            padding: 20px;
            padding-left: 40px;
            font-family: 'PT Serif', serif;
        }
        .business-type {
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .claimed {
            background-color: #f0f0f0;
            padding: 10px;
            margin-bottom: 20px;
            display: inline-block;
            font-size: 16px;
        }
        .location, .phone {
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }
        .location i, .phone i {
            margin-right: 10px;
            margin-top: 5px;
        }
        .location span, .phone span {
            display: inline-block;
            max-width: calc(100% - 20px);
            word-wrap: break-word;
        }
        .tiny-grey-line {
            border-top: 1px solid lightgrey;
            margin: 20px 0;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-content {
            margin-bottom: 20px;
        }

        /* Mobile view optimization */
        @media (max-width: 768px) {
            .header {
                display: none;
            }
            .mobile-header {
                display: flex;
            }
            .sidebar {
                display: none;
            }
            .business-details {
                padding: 10px;
                padding-left: 20px;
            }
            .business-type {
                font-size: 28px;
                margin-bottom: 8px;
            }
            .claimed {
                font-size: 14px;
                padding: 8px;
            }
            .location, .phone {
                font-size: 14px;
            }
            .section-title {
                font-size: 18px;
                margin-bottom: 8px;
            }
            .section-content {
                font-size: 14px;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
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
            <a href="index.php">Back to Main Website</a>
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

    <div class="business-details">
        <div class="business-type"><?php echo safe_output($user['business_type']); ?></div>
        <div class="claimed">Claimed</div>
        <div class="location">
            <i class="fas fa-map-marker-alt icon"></i>
            <span><?php echo safe_output($user['physical_address']); ?></span>
        </div>
        <div class="phone">
            <i class="fas fa-phone icon"></i>
            <span><?php echo safe_output($user['business_phone_no']); ?></span>
        </div>
        <div class="tiny-grey-line"></div>
        <div class="section-title">About</div>
        <div class="section-content"><?php echo safe_output($user['about']); ?></div>
        <div class="section-title">Products & Services</div>
        <div class="section-content"><?php echo safe_output($user['products_services']); ?></div>
        <div class="section-title">Additional Info</div>
        <div class="section-content"><?php echo safe_output($user['additional_info']); ?></div>
    </div>

    <div class="popup" id="menuPopup">
        <div class="popup-content">
            <a href="index.php">Home</a>
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            <?php endif; ?>
            <a href="index.php">Back to Main Website</a>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById('menuPopup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('menuPopup').style.display = 'none';
        }
    </script>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>
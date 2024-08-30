<?php
include 'db.php';

// Fetch search query from URL
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch filtered user data based on search query
if (!empty($searchQuery)) {
    $sql = "SELECT * FROM members WHERE business_type LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
} else {
    // Fetch all user data
    $sql = "SELECT * FROM members";
}

$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No users found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Etsako Club 81 Listings</title>
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
        .mobile-search-box input {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            padding: 5px;
        }
        .mobile-search-box input::placeholder {
            color: grey;
        }
        .mobile-search-box input:focus {
            outline: none;
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
        .claim-button {
            background-color: #100660;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        .subheader {
            background-color: white;
            color: #333;
            padding: 11px 17px;
            text-align: left;
            font-size: 17px;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            width: 100%;
            margin-top: 5px;
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
        .sidebar h2 {
            margin: 0 0 10px 0;
            border-bottom: 1px solid lightgrey;
            padding-bottom: 10px;
        }
        .sidebar p {
            word-wrap: break-word; /* Ensure long addresses break to fit the sidebar width */
        }
        .content {
            padding: 20px;
            flex: 3;
            margin: 0 20px;
            background-color: white;
        }
        .row {
            display: flex;
            padding: 10px;
            border: 1px solid lightgrey;
            background-color: white;
            align-items: center;
            margin-bottom: 10px;
        }
        .column {
            flex: 1;
            padding: 10px;
        }
        .column img {
            max-width: 200px;
            max-height: 150px;
            border: 2px solid lightgrey;
            margin-right: 10px;
        }
        .footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
            margin-top: auto;
        }
        .footer-column {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .footer-column a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
            align-items: center;
        }
        .footer-column a:hover {
            text-decoration: underline;
        }
        .right-reserved {
            display: none;
        }
        .icon {
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 5px;
        }
        .claimed {
            display: flex;
            align-items: center;
        }
        .claimed-icon {
            width: 16px;
            height: 16px;
            background-color: lightgrey;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
            border-radius: 50%;
        }
        .claimed-icon::before {
            content: "✓";
            color: white;
            font-size: 12px;
        }
        .searchm-box {
            display: flex;
            align-items: center;
            margin-right: auto;
            margin-left: 60px;
        }
        #searchm-input, #search-button {
            height: 40px;
            line-height: 40px;
            font-size: 16px;
            padding: 0 10px;
        }
        #searchm-input {
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 5px 0 0 5px;
            box-sizing: border-box;
        }
        #searchm-button {
            border: 1px solid #ccc;
            background-color: #944b1e;
            color: white;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
            border-left: none;
            box-sizing: border-box;
        }
        .mobile-header .search-box {
            flex-grow: 1;
            margin-right: 0;
        }
        .mobile-header .logo {
            margin: auto;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 15px;
            width: 150px;
            height: auto;
        }
        .menu-icon {
            width: 40px;
            height: 40px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: black;
            font-size: 24px;
        }
        .new-search-box {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: white;
            margin: 0 auto;
            color: black;
            display: none;
        }
        .new-search-box input {
            width: 80%;
            padding: 5px;
            border: none;
            background-color: lightgrey;
            color: black;
            margin-left: 20px;
        }
        .new-search-box input::placeholder {
            color: black;
        }
        .new-search-box input:focus {
            outline: none;
        }
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 999;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .popup-content {
            position: absolute;
            top: 23%;
            left: 30%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            text-align: left;
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
        }
        .popup-content a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: black;
            font-size: 18px;
        }
        .popup-content a:hover {
            text-decoration: underline;
        }
        .close-btn {
            background-color: #ccc;
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
        }
        .close-btn:hover {
            background-color: #aaa;
        }
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
            .mobile-header .logo {
                display: block;
            }
            .menu-icon {
                display: block;
            }
            .new-search-box {
                display: none;
            }
            .searchm-box {
                display: block;
                margin-top: 10px;
                margin-left: 28px;
            }
        }
        @media (min-width: 769px) {
            .new-search-box {
                display: none;
            }
            .sidebar {
                display: block;
                background-color: white;
                border: 1px solid lightgrey;
                margin-right: 20px;
            }
            .mobile-header .logo {
                display: none;
            }
            .menu-icon {
                display: none;
            }
            .searchm-box {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="subheader">
        List
    </div>
    <div class="content-wrapper">
        <div class="sidebar">
            <h2>Popular Businesses</h2>
            <ul>
                <?php foreach ($users as $user): ?>
                    <li>
                        <p><strong><?php echo htmlspecialchars($user['business_type']); ?></strong></p>
                        <p>Location: 
                            <?php 
                                $address = htmlspecialchars($user['physical_address']);
                                echo wordwrap($address, 30, "<br />\n", true); 
                            ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="content">
            <?php foreach ($users as $user): ?>
                <div class="row">
                    <div class="column">
                        <?php
                            $image_src = isset($user['image_path']) ? $user['image_path'] : 'https://via.placeholder.com/200x150.png?text=Business+Image';
                            $image_src .= '?' . time(); // To bypass caching
                        ?>
                        <img src="<?php echo $image_src; ?>" alt="Business Image" id="business-image" style="width: 100px; height: 200px; border: 1px solid lightgrey; vertical-align: top;">
                    </div>
                    <div class="column">
                        <p>Name: 
                            <a href="business_details.php?id=<?php echo urlencode($user['id']); ?>">
                                <?php echo htmlspecialchars($user['first_name']); ?>
                            </a>
                        </p>
                        <p>Business Type:
                                <?php echo htmlspecialchars($user['business_type']); ?>
                        </p>
                        <p>Location: 
                            <?php 
                                $address = htmlspecialchars($user['physical_address']);
                                echo wordwrap($address, 30, "<br />\n", true); 
                            ?>
                        </p>
                        <p class="icons-paragraph">
                            <span>
                                <a href="mailto:<?php echo htmlspecialchars($user['email']); ?>" class="email-icon" aria-hidden="true">📧</a>
                                <a href="tel:+<?php echo htmlspecialchars($user['business_phone_no']); ?>" class="phone-icon" aria-hidden="true">📞</a>
                            </span>
                            <span class="social-icons">
                                <a href="<?php echo htmlspecialchars($user['facebook_url']); ?>" class="social-icon" aria-hidden="true" title="Facebook"><i class="fab fa-facebook"></i></a>
                                <a href="<?php echo htmlspecialchars($user['twitter_url']); ?>" class="social-icon" aria-hidden="true" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="<?php echo htmlspecialchars($user['linkedin_url']); ?>" class="social-icon" aria-hidden="true" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                                <a href="<?php echo htmlspecialchars($user['instagram_url']); ?>" class="social-icon" aria-hidden="true" title="Instagram"><i class="fab fa-instagram"></i></a>
                            </span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>

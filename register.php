<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Registration Form</title>
    
</head>
<body>
    <?php 
    session_start();
    include 'includes/header.php';
    ?>
    <div class="subheader">
        Registration Form
    </div>
    <div class="content" style="
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    ">
    <!-- Display error message if it exists -->
        <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (isset($_SESSION['error'])) {
        echo "<div style='color: red;'>" . htmlspecialchars($_SESSION['error']) . "</div>";
    }
    ?>
        <form action="submit_registration.php" method="post" style="
    font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
">
    <div style="margin-bottom: 15px;">
        <label for="firstName" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">First Name</label>
        <input type="text" id="firstName" name="firstName" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="lastName" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Last Name</label>
        <input type="text" id="lastName" name="lastName" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="clubAffiliation" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Club Affiliation</label>
        <select id="clubAffiliation" name="clubAffiliation" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
            <option value="HQ">HQ</option>
            <option value="Abuja">Abuja</option>
            <option value="Benin">Benin</option>
            <option value="US">US</option>
            <option value="Europe">Europe</option>
        </select>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="membershipNo" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Membership No</label>
        <input type="text" id="membershipNo" name="membershipNo" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="companyName" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Name of Company</label>
        <input type="text" id="companyName" name="companyName" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="businessType" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Type of Business Engaged In</label>
        <input type="text" id="businessType" name="businessType" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="businessPhone" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Business Phone No</label>
        <input type="tel" id="businessPhoneNo" name="businessPhoneNo" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="email" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Email Address</label>
        <input type="email" id="email" name="email" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="address" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Physical Address</label>
        <input type="text" id="physicalAddress" name="physicalAddress" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="contactPerson" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Contact Person</label>
        <input type="text" id="contactPerson" name="contactPerson" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="productsServices" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Products and Services Being Rendered</label>
        <textarea id="productsServices" name="productsServices" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        "></textarea>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="additionalInfo" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Additional Information</label>
        <textarea id="additionalInfo" name="additionalInfo" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        "></textarea>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="username" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Username</label>
        <input type="text" id="username" name="username" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="password" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Password</label>
        <input type="password" id="password" name="password" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="facebook_url" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Facebook URL</label>
        <input type="url" id="facebook_url" name="facebook_url" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="twitter_url" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Twitter URL</label>
        <input type="url" id="twitter_url" name="twitter_url" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="linkedin_url" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">LinkedIn URL</label>
        <input type="url" id="linkedin_url" name="linkedin_url" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="instagram_url" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Instagram URL</label>
        <input type="url" id="instagram_url" name="instagram_url" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="registration_date" style="
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        ">Registration Date</label>
        <input type="date" id="registration_date" name="registration_date" style="
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        ">
    </div>
    <div style="text-align: center;">
        <button type="submit" style="
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        ">Submit</button>
    </div>
</form>
</div>
<?php include 'includes/footer.php'; ?>
    <script>
    // Clear the session error message after the page has loaded
    window.addEventListener('load', function() {
        <?php unset($_SESSION['error']); ?>
    });
</script>
    <script>
        
        function performSearch() {
            const query = document.getElementById('search-input').value;
            console.log('Searching for:', query);
            // Add search functionality here
        }
    </script>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>

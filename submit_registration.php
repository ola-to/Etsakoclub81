<?php
include 'db.php';
session_start(); // Start session to use session variables

function emailExists($conn, $email) {
    // Prepare SQL to check email in both users and members tables
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ? UNION ALL SELECT COUNT(*) FROM members WHERE email = ?");
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $stmt->bind_result($countUsers);
    $stmt->fetch();
    $stmt->fetch(); // Fetch the second result (from members table)
    $stmt->close();

    // Return true if the email exists in either table
    return $countUsers > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data and sanitize it
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $clubAffiliation = $_POST['clubAffiliation'] ?? '';
    $membershipNo = $_POST['membershipNo'] ?? '';
    $companyName = $_POST['companyName'] ?? '';
    $businessType = $_POST['businessType'] ?? '';
    $businessPhoneNo = $_POST['businessPhoneNo'] ?? '';
    $email = $_POST['email'] ?? '';
    $physicalAddress = $_POST['physicalAddress'] ?? '';
    $contactPerson = $_POST['contactPerson'] ?? '';
    $productsServices = $_POST['productsServices'] ?? '';
    $additionalInfo = $_POST['additionalInfo'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $facebookUrl = $_POST['facebook_url'] ?? '';
    $twitterUrl = $_POST['twitter_url'] ?? '';
    $linkedinUrl = $_POST['linkedin_url'] ?? '';
    $instagramUrl = $_POST['instagram_url'] ?? '';
    $registrationDate = date('Y-m-d'); // Current date

    // Check if the email already exists in the database
    if (emailExists($conn, $email)) {
        $_SESSION['error'] = "The email address is already registered.";
        header("Location: register.php"); // Redirect back to the registration form
        exit();
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Start a transaction
        $conn->begin_transaction();

        try {
            // Prepare and bind for members table
            $stmt = $conn->prepare("INSERT INTO members (first_name, last_name, club_affiliation, membership_no, company_name, business_type, business_phone_no, email, physical_address, contact_person, products_services, additional_info, username, password, facebook_url, twitter_url, linkedin_url, instagram_url, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssssssss", $firstName, $lastName, $clubAffiliation, $membershipNo, $companyName, $businessType, $businessPhoneNo, $email, $physicalAddress, $contactPerson, $productsServices, $additionalInfo, $username, $hashedPassword, $facebookUrl, $twitterUrl, $linkedinUrl, $instagramUrl, $registrationDate);

            // Execute the prepared statement
            if (!$stmt->execute()) {
                throw new Exception($stmt->error);
            }

            // Prepare and bind for users table
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashedPassword);

            // Execute the prepared statement
            if (!$stmt->execute()) {
                throw new Exception($stmt->error);
            }

            // Commit the transaction
            $conn->commit();

            // Redirect to login page
            header("Location: login.php");
            exit();
        } catch (Exception $e) {
            // Rollback the transaction if something failed
            $conn->rollback();
            $_SESSION['error'] = "Registration failed: " . $e->getMessage();
            header("Location: register.php");
            exit();
        }

        $stmt->close();
    }
}

$conn->close();
?>

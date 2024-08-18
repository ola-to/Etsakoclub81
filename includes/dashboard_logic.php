<?php
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

include 'db.php';

// Get the logged-in user's membership number from the session
$membership_no = $_SESSION['membership_no'];

if ($membership_no) {
    $query = "SELECT * FROM members WHERE membership_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $membership_no); // Assuming membership_no is a string
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $business = $result->fetch_assoc();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    $business = null;
    echo 'No membership number provided.';
}

// Handle image upload and update in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Update the image path in the database
            $stmt = $conn->prepare("UPDATE members SET image_path = ? WHERE membership_no = ?");
            $stmt->bind_param("ss", $target_file, $membership_no);
            if ($stmt->execute()) {
                $_SESSION['flash_message'] = 'Image uploaded successfully!';
                header("Location: dashboard.php");
                exit;
            }
        } else {
            $_SESSION['flash_message'] = 'Sorry, there was an error uploading your file.';
        }
    } else {
        $_SESSION['flash_message'] = 'File is not an image.';
    }
}
?>
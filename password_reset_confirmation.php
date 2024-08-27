<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/password_reset_confirmation.css">
    <title>Password Reset Confirmation</title>

    <style>
        
        /* Footer styling */
        .footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%; /* Ensures the footer spans the full width of the page */
            box-sizing: border-box;
            flex-shrink: 0; /* Prevents the footer from shrinking */
        }

        /* Footer column styling */
        .footer-column {
            display: flex;
            justify-content: center; /* Center the content horizontally */
            align-items: center;
        }

        /* Links inside the footer */
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

        /* Optional: Icons within the footer */
        .icon {
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 5px;
        }

        /* Hide reserved text if needed */
        .right-reserved {
            display: none;
        }

        /* Styling for the form header */
        .form-header {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        /* Styling for the confirmation message */
        .confirmation-message {
            font-size: 18px;
            margin-bottom: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="subheader"></div>
    <div class="content">
        <div class="form-header">
            Password Reset
        </div>
        <div class="confirmation-message">
            A password reset link has been sent to your email address.
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Password Reset Confirmation</title>

    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Include padding and border in the element's width and height */
        }

        /* Ensure the page takes the full height of the viewport */
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Content area should take up available space, pushing the footer down */
        .content {
            flex: 1;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%; /* Ensures content area fits within the viewport */
        }

        .form-header {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .confirmation-message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #555;
        }

        .form-button {
            padding: 10px 20px;
            background-color: #944b1e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .form-button:hover {
            background-color: #752f0a;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?> <!-- Include the header -->
    <div class="content">
        <div class="form-header">
            Password Reset Successful
        </div>
        <div class="confirmation-message">
            Your password has been reset successfully.
        </div>
        <a href="login.php" class="form-button">Sign in now</a> <!-- Button to go to the sign-in page -->
    </div>
    <?php include 'includes/footer.php'; ?> <!-- Include the footer -->
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
</body>
</html>
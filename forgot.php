<?php
// Assuming you already have a database connection established
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "caloriecalc";

// Establish database connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Generate a random password reset token
    $token = md5(uniqid());

    // Update the user's record with the reset token
    $query = "UPDATE user SET reset_token = '$token' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Send the reset link to the user's email
        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
        $message = "Click the following link to reset your password: $resetLink";
        // Use your preferred method to send the email, e.g., mail() function

        // Display a success message to the user
        echo "Password reset link has been sent to your email.";
    } else {
        echo "Failed to update user record.";
    }
}
?>
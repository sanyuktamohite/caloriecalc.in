<?php
// Database connection settings
$host = "localhost"; // replace with your database host
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$database = "caloriecalc"; // replace with your database name

// Create a new connection
$conn = new mysqli($host, $username, $password, $database);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];



$sql = "INSERT INTO contactus (name, email, comment) VALUES ( ?, ?, ? )";
$stmt = mysqli_stmt_init($conn);
$prepareStmt = mysqli_stmt_prepare($stmt,$sql);
if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt,"sss",$name, $email, $comment);
    mysqli_stmt_execute($stmt);
    echo "<div class='alert alert-success'>Your Feedback is successfully recorded.</div>";
}else{
    die("Something went wrong");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully Feedback Recorded! </title>

    <style>
        .body{
            background: url("./calculator_background.jpg") no-repeat;
        }
        .alert-success{
            text-align: center;
            font-size: 2em;
        }

        p{
            text-align: center;
            font-size: 1em;

        }

        a{
            text-decoration: none;

        }

        a:hover{
            cursor: pointer;

        }
    </style>
</head>
<body>
    <p>Go back to <a href="home.php"> Home Page</a></p>
</body>
</html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caloriecalc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$gender = $_POST['gender'];
$activityLevel = $_POST['activity_level'];
$goal = $_POST['goal'];

$sql = "INSERT INTO  customers (name, age, weight, height, gender, activity_level, goal)
        VALUES ('$name', $age, $weight, $height, '$gender', '$activityLevel', '$goal')";

if ($conn->query($sql) === TRUE) {
    header("Location: result.php?id=" . $conn->insert_id);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

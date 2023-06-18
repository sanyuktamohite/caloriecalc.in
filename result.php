<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caloriecalc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM customers WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $weight = $row['weight'];
    $height = $row['height'];
    $age = $row['age'];
    $gender = $row['gender'];
    $activityLevel = $row['activity_level'];
    $goal = $row['goal'];

    // Perform calorie calculations based on the provided data

    // Calculate BMR (Basal Metabolic Rate) using the Harris-Benedict equation
    if ($gender === 'male') {
        $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    } else {
        $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
    }

    // Calculate calorie intake based on activity level
    switch ($activityLevel) {
        case 'sedentary':
            $calorieIntake = $bmr * 1.2;
            break;
        case 'lightly_active':
            $calorieIntake = $bmr * 1.375;
            break;
        case 'moderately_active':
            $calorieIntake = $bmr * 1.55;
            break;
        case 'very_active':
            $calorieIntake = $bmr * 1.725;
            break;
        case 'extra_active':
            $calorieIntake = $bmr * 1.9;
            break;
        default:
            $calorieIntake = 0;
            break;
    }

    // Calculate goal calorie intake
    switch ($goal) {
        case 'lose_weight':
            $goalCalorieIntake = $calorieIntake - 500;
            break;
        case 'gain_weight':
            $goalCalorieIntake = $calorieIntake + 500;
            break;
        case 'maintain_weight':
        default:
            $goalCalorieIntake = $calorieIntake;
            break;
    }

    include('result.html');
} else {
    echo "User not found.";
}

$conn->close();
?>

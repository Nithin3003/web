<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traveljoy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$plan_id = $_POST['plan_id'];
$destination = $_POST['destination'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$accommodation = $_POST['accommodation'];
$activities = $_POST['activities'];

$sql = "UPDATE plans SET destination='$destination', start_date='$start_date', end_date='$end_date', accommodation='$accommodation', activities='$activities' WHERE id='$plan_id'";

if ($conn->query($sql) === TRUE) {
    echo "Plan updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: profile.php");
exit();
?>
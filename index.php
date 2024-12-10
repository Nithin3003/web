<?php
session_start();
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

// Register user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO userdetails (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to main.html after successful registration
        header("Location: main.php");
        exit();
    } else {
        echo "<h2 style='color=:red;' >Error: " . $sql . "<br>" . $conn->error."</h2>";
    }
}

// Login user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userdetails WHERE email='$email'";
    $result = $conn->query($sql);
    $user = $_SESSION['username'];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start session and store user info
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            // Redirect to main.html after successful login
            header("Location: main.php");
            exit();
        } else {
            echo "<h2 style='color:red;' >Invalid password</h2>";
        }
    } else {
        echo "<h2 style='color:red;' >No user found with this email</h2>";
    }
}

// Add plan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_plan'])) {
    $user_id = $_SESSION['user_id'];
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $accommodation = $_POST['accommodation'];
    $activities = $_POST['activities'];

    $sql = "INSERT INTO plans (user_id, destination, start_date, end_date, accommodation, activities) VALUES ('$user_id', '$destination', '$start_date', '$end_date', '$accommodation', '$activities')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:red;'>Plan added successfully</h2>";
    } else {
        echo "<h2 style='color:red;' >Error: " . $sql . "<br>" . $conn->error."</h2>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/tailwind.css">
</head>
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.html">Home</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myplans.php">My Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <form action="index.php" method="post" class="bg-gradient-to-r from-cyan-400 to-sky-500">
        <div class="container form">
            <h2>Login to Travel Joy</h2><br>
            <input type="hidden" name="login" value="1">
            <div class="name">
                <i class="fa-solid fa-user"></i>
                <span>Email</span><br>
                <input type="email" placeholder="youremail@gmail.com" require name="email" class="inp">
                <br>
                <i class="fa-solid fa-lock"></i>
                <span>Password</span><br>
                <input type="password" name="password" require placeholder="*********">
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
            <br>

<span>Don't have an account? <a href="/booking/register.html"> register</a></span>
</div>
</form>
</body>
</html>
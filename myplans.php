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
$user = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM plans WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plans - Travel Joy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/booking/main.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/booking/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/booking/myplans.php">My Plans</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
            <span class="navbar-text ms-auto">
                Hi, <?php echo htmlspecialchars($user); ?>
            </span>  
        </div>
    </div>
</nav>
    <div class="container my-5">
        <h2 class="text-center mb-4">My Plans</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="row">
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['destination']); ?></h5>
                                <p class="card-text">
                                    <strong>Start Date:</strong> <?php echo htmlspecialchars($row['start_date']); ?><br>
                                    <strong>End Date:</strong> <?php echo htmlspecialchars($row['end_date']); ?><br>
                                    <strong>Accommodation:</strong> <?php echo htmlspecialchars($row['accommodation']); ?><br>
                                    <strong>Activities:</strong> <?php echo nl2br(htmlspecialchars($row['activities'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">No plans found. <a href="form.html">Add a new plan</a></p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
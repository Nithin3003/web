<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /booking");
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

$user_id = $_SESSION['user_id'];

// Fetch user details
$sql_user = "SELECT * FROM userdetails WHERE id = '$user_id'";
$result_user = $conn->query($sql_user);
$user = $result_user->fetch_assoc();

// Fetch user plans
$sql_plans = "SELECT * FROM plans WHERE user_id = '$user_id'";
$result_plans = $conn->query($sql_plans);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Travel Joy</title>
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
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="text-center mb-4">Profile</h2>
        <form action="update_profile.php" method="POST">
            <h3>User Details</h3>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>

        <h3 class="mt-5">My Plans</h3>
        <?php if ($result_plans->num_rows > 0): ?>
            <?php while($plan = $result_plans->fetch_assoc()): ?>
                <form action="/booking/update_plan.php" method="POST" class="mb-4">
                    <input type="hidden" name="plan_id" value="<?php echo $plan['id']; ?>">
                    <div class="mb-3">
                        <label for="destination_<?php echo $plan['id']; ?>" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination_<?php echo $plan['id']; ?>" name="destination" value="<?php echo htmlspecialchars($plan['destination']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date_<?php echo $plan['id']; ?>" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date_<?php echo $plan['id']; ?>" name="start_date" value="<?php echo $plan['start_date']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date_<?php echo $plan['id']; ?>" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date_<?php echo $plan['id']; ?>" name="end_date" value="<?php echo $plan['end_date']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="accommodation_<?php echo $plan['id']; ?>" class="form-label">Accommodation</label>
                        <input type="text" class="form-control" id="accommodation_<?php echo $plan['id']; ?>" name="accommodation" value="<?php echo htmlspecialchars($plan['accommodation']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="activities_<?php echo $plan['id']; ?>" class="form-label">Activities</label>
                        <textarea class="form-control" id="activities_<?php echo $plan['id']; ?>" name="activities" rows="3" required><?php echo htmlspecialchars($plan['activities']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Plan</button>
                </form>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No plans found. <a href="/booking/form.html">Add a new plan</a></p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
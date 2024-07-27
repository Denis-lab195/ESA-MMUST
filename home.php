<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        /* Your styles here */
    </style>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['reg_number']); ?>.</p>
    <a href="logout.php">Logout</a>
</body>
</html>

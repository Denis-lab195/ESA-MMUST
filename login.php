<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php'; // Ensure this includes your database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_number = $_POST['reg_number'];
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE reg_number = ?");

    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("s", $reg_number);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($stored_password);
            $stmt->fetch();

            // Verify the plain text password
            if ($password === $stored_password) {
                $_SESSION['loggedin'] = true;
                $_SESSION['reg_number'] = $reg_number;
                header("Location: Student Registry.html");
                exit();
            } else {
                echo "<p style='color: red;'>Invalid password.</p>";
            }
        } else {
            echo "<p style='color: red;'>No user found with this registration number.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

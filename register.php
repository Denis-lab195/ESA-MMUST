<?php
session_start();
include 'db.php'; // Ensure this includes your database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $reg_number = $_POST['reg_number'];

    if ($password === $confirm_password) {
        // Store the password in plain text (not recommended)
        $plain_password = $password;

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (email, password, reg_number) VALUES (?, ?, ?)");

        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("sss", $email, $plain_password, $reg_number);

        if ($stmt->execute()) {
            $_SESSION['registration_success'] = "Registration successful! You can now log in.";
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }

    $conn->close();
}
?>

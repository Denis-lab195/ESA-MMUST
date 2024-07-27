<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_number = $_POST['reg_number'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE reg_number = ?");

    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("s", $reg_number);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if ($password === $hashed_password) { // No hashing, direct comparison
                $_SESSION['loggedin'] = true;
                $_SESSION['reg_number'] = $reg_number;
                header("Location: Home.html");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with this registration number.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

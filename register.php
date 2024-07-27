<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $reg_number = $_POST['reg_number'];

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, reg_number) VALUES ('$email', '$hashed_password', '$reg_number')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.html");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Passwords do not match.";
    }

    $conn->close();
}
?>
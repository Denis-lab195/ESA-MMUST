<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_number = $_POST['reg_number'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE reg_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $reg_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            header("Location: ESA.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

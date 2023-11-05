<?php
session_start(); // Start a new or resume the existing session

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "root", "", "rent_car");

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT * FROM user_info WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();

        if ($data['password'] == $password) {
            $_SESSION['user_id'] = $username; // Store user information in the session
            header("Location: index.html"); // Redirect to the dashboard page after successful login
            exit();
        } else {
            echo '<script>alert("Invalid Username or Password");</script>';
        }
    } else {
        echo '<script>alert("Invalid Username or Password");</script>';
    }

    // Close the database connection
    $conn->close();
}
?>

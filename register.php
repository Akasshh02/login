<?php
include 'config.php'; // connect to DB

// Get data from form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Registration successful!</h3>";
    echo "<a href='login.html'>Go to Login</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

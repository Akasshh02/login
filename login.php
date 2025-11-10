<?php
include 'config.php'; // connect to DB

$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user from database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $row['password'])) {
        echo "<h3>Login successful! Welcome, " . $row['username'] . " 🎉</h3>";
    } else {
        echo "<h3>Invalid password ❌</h3>";
    }
} else {
    echo "<h3>No user found with that username ❌</h3>";
}

$conn->close();
?>

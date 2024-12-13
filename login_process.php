<?php
session_start();

// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$database = "InstituteDB";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Check if username exists
        $checkQuery = "SELECT * FROM Users WHERE username = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $user['Password'])) {
                // Store username and first name in session
                $_SESSION['username'] = $username;
                $_SESSION['first_name'] = $user['first_name']; // Store first name

                header('Location: welcome.php');
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
        $stmt->close();
    }
}

$conn->close();
?>

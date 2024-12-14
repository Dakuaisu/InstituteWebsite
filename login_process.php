<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "InstituteDB";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header('Location: login.php');
        exit();
    } else {
        $checkQuery = "SELECT * FROM Users WHERE username = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['role'] = $user['role'];
                
                header('Location: welcome.php');
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password.";
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid username or password.";
            header('Location: login.php');
            exit();
        }
        $stmt->close();
    }
}

$conn->close();
?>

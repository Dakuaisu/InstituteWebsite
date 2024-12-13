<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php include './include/navbar.php';?>

    <!-- Welcome Section -->
    <main class="py-10 container mx-auto text-center">
        <h1 class="text-4xl font-bold text-green-500 mb-6">Welcome, <?= htmlspecialchars($_SESSION['first_name']) ?>!</h1>
        <p class="text-lg mb-4">You have successfully logged in. Feel free to explore the website.</p>
        <a href="logout.php" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-500">Logout</a>
    </main>

    <!-- Footer -->
    <?php include './include/footer.php';?>

</body>
</html>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Get the username and first name from the session
$first_name = $_SESSION['first_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-100 to-blue-200 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php include './include/navbar.php'; ?>

    <!-- Welcome Section -->
    <main class="py-20 container mx-auto flex flex-col items-center">
        <div class="bg-white shadow-xl rounded-lg p-10 text-center max-w-lg">
            <h1 class="text-5xl font-extrabold text-green-600 mb-4">Welcome, <?= htmlspecialchars($first_name) ?>!</h1>
            <p class="text-lg text-gray-600 mb-6">
                We're thrilled to have you here. Explore our features, dive into the courses, or contact us for support.
            </p>
            <a href="logout.php" 
               class="inline-block bg-red-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-red-500 transition-all duration-300">
               Logout
            </a>
        </div>
    </main>

    <!-- Footer -->
    <?php include './include/footer.php'; ?>

</body>
</html>

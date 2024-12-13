<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include './include/navbar.php';?>

    <!-- About Section -->
    <main class="py-16 container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">About Our Institute</h1>
        <p class="text-lg text-center text-gray-600 max-w-3xl mx-auto mb-12">
            Our institute has been at the forefront of education for over two decades, fostering growth, innovation, and excellence. We are committed to providing quality education and nurturing talent for a brighter future.
        </p>
        <div class="grid md:grid-cols-2 gap-12">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <h2 class="text-2xl font-bold text-red-700 mb-4">Our Mission</h2>
                <p class="text-gray-600">
                    To empower students with knowledge, skills, and values that help them achieve their goals and contribute to society.
                </p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <h2 class="text-2xl font-bold text-red-700 mb-4">Our Vision</h2>
                <p class="text-gray-600">
                    To be a leader in education, inspiring and shaping future generations through innovative and inclusive approaches.
                </p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include './include/footer.php';?>
</body>
</html>

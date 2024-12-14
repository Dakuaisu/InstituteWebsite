<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <?php include './include/navbar.php'; ?>

    <header class="bg-gradient-to-r from-gray-600 to-gray-700 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-wide leading-tight">Welcome to ABC Institute</h1>
            <p class="mt-4 text-lg md:text-xl font-light leading-relaxed">Empowering the next generation with knowledge, skills, and innovation.</p>
            <a href="about.php" class="mt-6 inline-block bg-white text-red-700 py-3 px-6 rounded-lg text-lg font-semibold transition-all duration-300 hover:bg-red-600 hover:text-white">Learn More</a>
        </div>
    </header>

    <main class="py-10 container mx-auto px-4">
        <section class="mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-6">Our Programs</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-2xl font-semibold text-gray-800">Undergraduate</h3>
                    <p class="mt-3 text-gray-600">Explore a variety of undergraduate programs designed to build your foundation for success in the professional world.</p>
                    <a href="undergraduate.php" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-2xl font-semibold text-gray-800">Postgraduate</h3>
                    <p class="mt-3 text-gray-600">Advance your career with specialized postgraduate programs tailored for professional growth and expertise.</p>
                    <a href="postgraduate.php" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transition-all duration-300">
                    <h3 class="text-2xl font-semibold text-gray-800">Professional Development</h3>
                    <p class="mt-3 text-gray-600">Upgrade your skills with our professional development courses, certifications, and workshops designed to enhance your career.</p>
                    <a href="professional.php" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
            </div>
        </section>

        <section class="bg-gray-600 text-white py-16 text-center">
            <h3 class="text-2xl md:text-3xl font-semibold mb-4">Join Us Today and Shape Your Future</h3>
            <p class="text-lg md:text-xl font-light mb-6">Whether you're starting your educational journey or looking to advance your career, ABC Institute offers the resources and opportunities to help you succeed.</p>
            <a href="signup.php" class="inline-block bg-white text-red-700 py-3 px-6 rounded-lg text-lg font-semibold hover:bg-gray-200">Get Started</a>
        </section>
    </main>

    <?php include './include/footer.php'; ?>
</body>

</html>

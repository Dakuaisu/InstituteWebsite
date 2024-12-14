<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    
    <?php include './include/navbar.php';?>

    <!-- Courses Section -->
    <main class="py-16 container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-12">Explore Our Courses</h1>
        
        <div class="grid md:grid-cols-3 gap-12">
            <!-- Course 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="path_to_image/pythoned.png" alt="Course 1" class="w-full h-48  rounded-t-lg mb-6">
                <h2 class="text-2xl font-semibold text-red-700 mb-4">Python Programming</h2>
                <p class="text-gray-600 mb-6">This course provides an in-depth understanding of the basics of programming, covering key concepts like Object Oriented Programming.</p>
                <a href="course_details.php?course=1" class="text-red-600 font-semibold hover:underline">Learn More</a>
            </div>

            <!-- Course 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="path_to_image/1715058774193.jpg" alt="Course 2" class="w-full h-48 object-cover rounded-t-lg mb-6">
                <h2 class="text-2xl font-semibold text-red-700 mb-4">Web Development</h2>
                <p class="text-gray-600 mb-6">An advanced course for web development, focusing on frameworks such as React and Vue.js, along with backend technologies like Node.js.</p>
                <a href="course_details.php?course=2" class="text-red-600 font-semibold hover:underline">Learn More</a>
            </div>

            <!-- Course 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="path_to_image/What-is-data-science-2.jpg  " alt="Course 3" class="w-full h-48 object-cover rounded-t-lg mb-6">
                <h2 class="text-2xl font-semibold text-red-700 mb-4">Data Science</h2>
                <p class="text-gray-600 mb-6">A comprehensive introduction to data science, covering tools like R, Python, and various data analysis techniques.</p>
                <a href="course_details.php?course=3" class="text-red-600 font-semibold hover:underline">Learn More</a>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="all_courses.php" class="bg-red-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-500 transition-colors">View All Courses</a>
        </div>
    </main>

    <?php include './include/footer.php';?>
</body>
</html>

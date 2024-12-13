<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include './include/navbar.php';?>

    <!-- Contact Section -->
    <main class="py-10 container mx-auto">
        <h1 class="text-4xl font-bold text-center mb-6">Contact Us</h1>
        <p class="text-lg text-center max-w-3xl mx-auto mb-10">
            Have questions? We are here to help. Fill out the form below or reach out to us directly.
        </p>
        <form action="contact_process.php" method="POST" class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-bold mb-2">Message:</label>
                <textarea id="message" name="message" class="w-full border rounded-lg px-3 py-2" rows="4" required></textarea>
            </div>
            <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded hover:bg-red-500">Submit</button>
        </form>
    </main>

    <!-- Footer -->
    <!-- Footer -->
    <?php include './include/footer.php';?>
</body>
</html>

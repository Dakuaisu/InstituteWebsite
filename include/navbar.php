<nav class="bg-red-700 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="index.php" class="text-2xl font-bold">ABC Institute</a>
        <ul class="flex space-x-4">
            <li><a href="index.php" class="hover:underline">Home</a></li>
            <li><a href="about.php" class="hover:underline">About</a></li>
            <li><a href="courses.php" class="hover:underline">Courses</a></li>
            <li><a href="contact.php" class="hover:underline">Contact</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <!-- Display first name and logout if the user is logged in -->
                <li><span class="text-white">Hello, <?= htmlspecialchars($_SESSION['first_name']) ?></span></li>
                <li><a href="logout.php" class="hover:underline">Logout</a></li>
            <?php else: ?>
                <!-- Display login and signup if the user is not logged in -->
                <li><a href="login.php" class="hover:underline">Login</a></li>
                <li><a href="signup.php" class="hover:underline">Sign Up</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

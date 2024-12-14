<nav class="bg-red-700 text-white p-4">
    <div class="container mx-auto flex justify-between items-center relative">
        <a href="index.php" class="text-2xl font-bold">ABC Institute</a>
        <ul class="flex space-x-4 items-center">
            <li><a href="index.php" class="hover:underline">Home</a></li>
            <li><a href="about.php" class="hover:underline">About</a></li>
            <li><a href="courses.php" class="hover:underline">Courses</a></li>
            <li><a href="contact.php" class="hover:underline">Contact</a></li>
            <?php if (isset($_SESSION['username'])): ?>
            <li class="relative" id="dropdown-container">
                <span class="text-white cursor-pointer" id="dropdown-toggle">Hello, <?= htmlspecialchars($_SESSION['first_name']) ?></span>
                <ul id="dropdown-menu" class="absolute hidden bg-white text-gray-800 rounded shadow-lg mt-2">
                    <?php if ($_SESSION['role'] === 'faculty'): ?>
                        <li><a href="faculty_update.php" class="block px-4 py-2 hover:bg-gray-100">Update Marks and Attendance</a></li>
                    <?php else: ?>
                        <li><a href="academic_attendance.php" class="block px-4 py-2 hover:bg-gray-100">Academic Attendance</a></li>
                        <li><a href="academic_marks.php" class="block px-4 py-2 hover:bg-gray-100">Academic Marks</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php" class="block px-4 py-2 hover:bg-gray-100">Logout</a></li>
                </ul>
            </li>
            <?php else: ?>
            <li><a href="login.php" class="hover:underline">Login</a></li>
            <li><a href="signup.php" class="hover:underline">Sign Up</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownToggle = document.getElementById('dropdown-toggle');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const dropdownContainer = document.getElementById('dropdown-container');

        // Toggle visibility on click
        dropdownToggle.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!dropdownContainer.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>

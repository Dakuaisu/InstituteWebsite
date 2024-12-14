<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-100 to-gray-200 text-white flex flex-col min-h-screen">
    <?php include './include/navbar.php'; ?>

    <main class="py-12 container mx-auto flex justify-center items-center flex-1">
        <div class="bg-white text-gray-800 shadow-lg rounded-lg max-w-md w-full p-8">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Login to Your Account</h1>

            <form action="login_process.php" method="POST">
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-gray-600 mb-2">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600" required>
                </div>

                <?php if (isset($error)): ?>
                    <div class="text-red-500 text-sm font-semibold mb-4">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <button type="submit" class="w-full py-2 px-4 bg-red-600 text-white rounded-lg hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 transition-all duration-300">
                    Login
                </button>

                <div class="mt-4 text-center">
                    <p class="text-sm">Don't have an account? <a href="signup.php" class="text-red-600 hover:underline">Sign Up</a></p>
                </div>
            </form>
        </div>
    </main>

    <?php include './include/footer.php'; ?>
</body>

</html>

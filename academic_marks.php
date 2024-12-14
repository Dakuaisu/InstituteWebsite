<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "InstituteDB";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username from the session
$username = $_SESSION['username'];

// Fetch marks for the user from the database
$query = "SELECT subject_name, marks FROM marks WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Store marks in an associative array
$marks = [];
while ($row = $result->fetch_assoc()) {
    $marks[$row['subject_name']] = $row['marks'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Attendance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php include './include/navbar.php'; ?>

    <!-- Main Content -->
    <main class="py-12 container mx-auto">
        <h1 class="text-4xl font-bold text-center text-red-600 mb-8">Academic Marks</h1>

        <!-- Display Marks -->
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Your Marks</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Subject</th>
                        <th class="border border-gray-300 px-4 py-2">Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($marks)): ?>
                        <?php foreach ($marks as $subject => $mark): ?>
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($subject) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($mark) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center border border-gray-300 px-4 py-2">
                                No marks available for you at the moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <?php include './include/footer.php'; ?>

</body>
</html>

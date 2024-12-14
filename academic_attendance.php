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

// Fetch attendance data for the user from the database
$query = "SELECT subject_name, total_classes, attended_classes FROM attendance WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Store attendance data in an associative array
$attendance = [];
while ($row = $result->fetch_assoc()) {
    $attendance[] = [
        'subject_name' => $row['subject_name'],
        'total_classes' => $row['total_classes'],
        'attended_classes' => $row['attended_classes'],
        'attendance_percentage' => round(($row['attended_classes'] / $row['total_classes']) * 100, 2)
    ];
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
        <h1 class="text-4xl font-bold text-center text-red-600 mb-8">Academic Attendance</h1>

        <!-- Display Attendance -->
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Your Attendance</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Subject</th>
                        <th class="border border-gray-300 px-4 py-2">Total Classes</th>
                        <th class="border border-gray-300 px-4 py-2">Attended Classes</th>
                        <th class="border border-gray-300 px-4 py-2">Attendance (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($attendance)): ?>
                        <?php foreach ($attendance as $record): ?>
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($record['subject_name']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($record['total_classes']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($record['attended_classes']) ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($record['attendance_percentage']) ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center border border-gray-300 px-4 py-2">
                                No attendance data available for you at the moment.
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

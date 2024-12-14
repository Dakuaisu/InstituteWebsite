<?php
session_start();

// Check if the user is logged in as faculty
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'faculty') {
    header('Location: login.php');
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "InstituteDB";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_marks'])) {
        // Update marks
        $student_username = $_POST['student_username'];
        $subject_name = $_POST['subject_name'];
        $marks = $_POST['marks'];

        $query = "UPDATE marks SET marks = ? WHERE username = ? AND subject_name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iss", $marks, $student_username, $subject_name);

        if ($stmt->execute()) {
            $marks_success_message = "Marks updated successfully.";
        } else {
            $marks_error_message = "Failed to update marks.";
        }
        $stmt->close();
    } elseif (isset($_POST['update_attendance'])) {
        // Update attendance
        $student_username = $_POST['student_username'];
        $subject_name = $_POST['subject_name'];
        $total_classes = $_POST['total_classes'];
        $attended_classes = $_POST['attended_classes'];

        $query = "UPDATE attendance SET total_classes = ?, attended_classes = ? WHERE username = ? AND subject_name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiss", $total_classes, $attended_classes, $student_username, $subject_name);

        if ($stmt->execute()) {
            $attendance_success_message = "Attendance updated successfully.";
        } else {
            $attendance_error_message = "Failed to update attendance.";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php include './include/navbar.php'; ?>

    <!-- Main Content -->
    <main class="py-12 container mx-auto">
        <h1 class="text-4xl font-bold text-center text-red-600 mb-8">Faculty Dashboard</h1>

        <!-- Success/Error Messages -->
        <?php if (isset($marks_success_message)): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6"> <?= htmlspecialchars($marks_success_message) ?> </div>
        <?php endif; ?>
        <?php if (isset($marks_error_message)): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6"> <?= htmlspecialchars($marks_error_message) ?> </div>
        <?php endif; ?>


        <!-- Update Marks -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Update Marks</h2>
            <form action="" method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="student_username" class="block text-sm font-medium text-gray-600">Student Username</label>
                        <input type="text" name="student_username" id="student_username" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div>
                        <label for="subject_name" class="block text-sm font-medium text-gray-600">Subject Name</label>
                        <input type="text" name="subject_name" id="subject_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>
                <div>
                    <label for="marks" class="block text-sm font-medium text-gray-600">Marks</label>
                    <input type="number" name="marks" id="marks" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <button type="submit" name="update_marks" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">Update Marks</button>
            </form>
        </section>
        <?php if (isset($attendance_success_message)): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6"> <?= htmlspecialchars($attendance_success_message) ?> </div>
        <?php endif; ?>
        <?php if (isset($attendance_error_message)): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6"> <?= htmlspecialchars($attendance_error_message) ?> </div>
        <?php endif; ?>
        <!-- Update Attendance -->
        <section class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Update Attendance</h2>
            <form action="" method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="student_username" class="block text-sm font-medium text-gray-600">Student Username</label>
                        <input type="text" name="student_username" id="student_username" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div>
                        <label for="subject_name" class="block text-sm font-medium text-gray-600">Subject Name</label>
                        <input type="text" name="subject_name" id="subject_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="total_classes" class="block text-sm font-medium text-gray-600">Total Classes</label>
                        <input type="number" name="total_classes" id="total_classes" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div>
                        <label for="attended_classes" class="block text-sm font-medium text-gray-600">Attended Classes</label>
                        <input type="number" name="attended_classes" id="attended_classes" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>
                <button type="submit" name="update_attendance" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">Update Attendance</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php include './include/footer.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const marksForm = document.querySelector('form[action=""][method="POST"]');
        const attendanceForm = document.querySelector('form[action=""][method="POST"]:last-of-type');

        marksForm.addEventListener('submit', (event) => {
            const marksInput = document.getElementById('marks');
            if (marksInput.value < 0 || marksInput.value > 100) {
                event.preventDefault();
                alert("Marks should be between 0 and 100.");
            }
        });

        attendanceForm.addEventListener('submit', (event) => {
            const totalClasses = document.getElementById('total_classes');
            const attendedClasses = document.getElementById('attended_classes');
            if (parseInt(attendedClasses.value) > parseInt(totalClasses.value)) {
                event.preventDefault();
                alert("Attended classes cannot exceed total classes.");
            }
        });
    });
</script>

</body>
</html>

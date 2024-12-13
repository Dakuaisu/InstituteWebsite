<?php
session_start();

// Initialize error and success messages
$error = '';
$success = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // Set the email recipient (e.g., your email address)
        $to = "your_email@example.com";  // Replace with your email
        $subject = "New Contact Form Submission from $name";

        // Prepare email content
        $body = "You have received a new message from your website contact form.\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message\n";

        // Set headers
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            $success = "Thank you for contacting us, $name! We will get back to you soon.";
        } else {
            $error = "There was an error sending your message. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include './include/navbar.php'; ?>

    <!-- Contact Form Response Section -->
    <main class="py-16 container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                    <strong>Error:</strong> <?= htmlspecialchars($error) ?>
                </div>
            <?php elseif ($success): ?>
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                    <strong>Success:</strong> <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <a href="contact.php" class="text-red-600 font-semibold hover:underline">Go back to Contact Form</a>
        </div>
    </main>

    <!-- Footer -->
    <?php include './include/footer.php'; ?>
</body>
</html>

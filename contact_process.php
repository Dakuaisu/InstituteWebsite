<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $to = "adnanrashid230@gmail.com";  
        $subject = "New Contact Form Submission from $name";

        $body = "You have received a new message from your website contact form.\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message\n";

        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8";

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
    <?php include './include/navbar.php'; ?>

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

    <?php include './include/footer.php'; ?>
</body>
</html>

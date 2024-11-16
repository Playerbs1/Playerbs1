<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the selected package data
    $package = $_POST['package'];

    // Email recipient
    $to = "www.playerbs1@gmail.com"; // Your Gmail address

    // Email subject
    $subject = "New Package Request";

    // Email message body
    $message = "A user has selected the following package:\n\n";
    $message .= "Package: " . $package . "\n";

    // Email headers
    $headers = "From: no-reply@yourwebsite.com" . "\r\n";
    $headers .= "Reply-To: no-reply@yourwebsite.com" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your package selection has been received.";
    } else {
        echo "Oops! Something went wrong. Please try again.";
    }
}
<?php
// Include PHPMailer and exceptions classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHMailer\Exception;

// Include Composer's autoloader if using Composer (or include PHPMailer's autoload.php)
require 'vendor/autoload.php'; // Ensure PHPMailer is installed

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Set mailer to use SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'playerbs1@gmail.com'; // Your Gmail address
        $mail->Password = 'your_gmail_app_password'; // Your Gmail App Password (if 2FA is enabled)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
        $mail->Port = 587; // SMTP port for TLS

        // Set sender's and recipient's information
        $mail->setFrom('playerbs1@gmail.com', 'Player B.S.1'); // Set the sender's email and name
        $mail->addAddress('recipient_email@example.com', 'Recipient Name'); // Add recipient's email

        // Set email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h3>You have received a new message from $name</h3>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Message:</strong><br>$message</p>";
        $mail->AltBody = "You have received a new message from $name\n\nEmail: $email\nMessage:\n$message";

        // Send email
        if ($mail->send()) {
            echo 'Message has been sent.';
        } else {
            echo 'Message could not be sent.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>

<!-- HTML Form to Collect Data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="email.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
?>
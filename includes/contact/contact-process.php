<?php
// Set recipient email address
$to = 'info@ecostruct.lk';

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare email headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Build email content
$email_content = "
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong><br>".nl2br($message)."</p>
</body>
</html>
";

// Send email
$mail_sent = mail($to, $subject, $email_content, $headers);

// Return response
if ($mail_sent) {
    echo '<div class="alert alert-success">Thank you! Your message has been sent successfully.</div>';
} else {
    echo '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
}
?>